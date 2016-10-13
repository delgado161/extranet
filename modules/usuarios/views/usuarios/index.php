<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\usuarios\models\Perfiles;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\usuarios\models\UsuariosSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index panel_up"  >
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-filter" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_filter']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-plus" aria-hidden="true"></i>'), ['create'], ['class' => 'btn_crear', 'style' => 'color:#58B02F']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['create'], ['class' => 'btn_crear', 'style' => 'color:#58B02F']) ?>


        </div>
        <div class="panel-body">



            <?php
            Pjax::begin(['id' => 'pbegin_' . $searchModel->tableName(),
//        'timeout' => false,
                'enablePushState' => false,]);
            ?>   
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'nombre_perfil',
                        'value' => 'flPerfil.nombre',
                        'filter' => Html::activeDropDownList($searchModel, 'nombre_perfil', ArrayHelper::map(Perfiles::find()->asArray()->all(), 'id_perfile', 'nombre'), ['class' => 'form-control', 'prompt' => 'Seleccione...']),
                    ],
                    [
                        'attribute' => 'nombre_persona',
                        'value' => function($dataProvider) {
                            return $dataProvider->flPersona->nombre . " " . $dataProvider->flPersona->s_nombre;
                        }
                    ],
                    [
                        'attribute' => 'apellido_persona',
                        'value' => function($dataProvider) {
                            return $dataProvider->flPersona->apellido . " " . $dataProvider->flPersona->s_apellido;
                        }
                    ],
//            ['class' => 'yii\grid\SerialColumn'],
//            'id_usuario',
//            'fl_perfil',
//            'fl_persona',
                    'username',
//            'clave',
                    // 'ultimo_login',
                    // 'status',
//            ['class' => 'yii\grid\ActionColumn'],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 115px;'],
                        'filter' => Html::activeDropDownList($searchModel, 'status', ["1" => "Activo", "0" => "Inactivo"], ['class' => 'form-control', 'prompt' => 'Seleccione...']),
//                        'filter' => array("1" => "Activo", "0" => "Inactivo"),
                        'value' => function($dataProvider, $key) {
                    return Yii::$app->Toolbox->flipSwitch($key, ($dataProvider->status == 0 ? '' : 'checked'), null, Url::to(['/usuarios/personas', 'id' => $dataProvider->id_usuario], true));
                }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 114px;'],
                        'header' => 'Acciones',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fa fa-eye" aria-hidden="true" style="font-size:20px;"></i>', $url, ['class' => 'btn btn-primary btn-xs']);
                            },
                                    'update' => function ($url, $model, $key) {
                                return Html::a('<i class = "fa icon-joker_edictar" aria-hidden = "true" style="font-size:20px;"></i>', $url, ['class' => 'btn btn-warning btn-xs']);
                            },
                                    'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-times-circle" aria-hidden="true" style="font-size:20px;">', $url, ['class' => 'btn btn-danger btn-xs']);
                            },
                                ],]
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
        </div>
    </div>
</div>