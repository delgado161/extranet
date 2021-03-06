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
            <?php Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-filter" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_filter', 'style' => 'color:darkturquoise']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-plus" aria-hidden="true"></i>'), ['create'], ['class' => 'btn_crear', 'style' => 'color:limegreen']) ?>
            <?php // Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['create'], ['class' => 'btn_crear', 'style' => 'color:#58B02F']) ?>


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
                'pager' => [
                    'firstPageLabel' => 'Primera',
                    'lastPageLabel' => 'Ultima'
                ],
                'columns' => [

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
                    [
                        'attribute' => 'nombre_perfil',
                        'value' => 'flPerfil.nombre',
                        'filter' => Html::activeDropDownList($searchModel, 'nombre_perfil', ArrayHelper::map(Perfiles::find()->asArray()->all(), 'id_perfile', 'nombre'), ['class' => 'form-control', 'prompt' => 'Seleccione...']),
                    ],
                    'username',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 115px;'],
                        'filter' => Html::activeDropDownList($searchModel, 'status', ["1" => "Activo", "0" => "Inactivo"], ['class' => 'form-control', 'prompt' => 'Seleccione...']),
                        'value' => function($dataProvider, $key) {
                    return Yii::$app->Toolbox->flipSwitch($key, ($dataProvider->status == 0 ? '' : 'checked'), null, Url::to(['/usuarios/usuarios/udpswitch', 'id' => $dataProvider->id_usuario], true));
                }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 114px;'],
                        'header' => 'Acciones',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fa fa-eye" aria-hidden="true" style="font-size:20px;"></i>', $url, ['class' => 'btn btn-info btn-xs']);
                            },
                                    'update' => function ($url, $model, $key) {
                                return Html::a('<i class = "fa icon-joker_documento" aria-hidden = "true" style="font-size:20px;"></i>', $url, ['class' => 'btn btn-warning btn-xs']);
                            },
                                    'delete' => function ($url, $model, $key) {
//                                return Html::a('<i class="fa fa-times-circle" aria-hidden="true" style="font-size:20px;">', $url, ['class' => 'btn btn-danger btn-xs']);
                            },
                                ],]
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?php 

    $xml_lang = file_get_contents('http://199.16.239.14/administrador/uploads/varios/es.xml');
    
//    var_dump(unserialize('a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'));

?>