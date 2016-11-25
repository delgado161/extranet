<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\usuarios\models\ClientesSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="clientes-index panel_up"  >

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echoHtml::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-filter" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_filter']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-plus" aria-hidden="true"></i>'), ['create'], ['class' => 'btn_crear', 'style' => 'color:#58B02F']) ?>

        </div>
        <div class="panel-body">
            <?php Pjax::begin(); ?>    <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager' => [
                    'firstPageLabel' => 'Primera',
                    'lastPageLabel' => 'Ultima'
                ],
                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],
//                    'id_cliente',
//                    'fk_cliente_ref',
//                    'fk_presona_ref',
                    'nombre',
//                    'nombre_corto',
                    // 'telefono_1',
                    // 'telefono_2',
                    // 'fax',
                    // 'rif',
                    // 'nit',
                    // 'status',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 115px;'],
                        'filter' => array("1" => "Activo", "0" => "Inactivo"),
                        'value' => function($dataProvider, $key) {
                    return Yii::$app->Toolbox->flipSwitch($key, ($dataProvider->status == 0 ? '' : 'checked'), null, Url::to(['/clientes/clientes/udpswitch', 'id' => $key], true));
                }
                    ],
//                    ['class' => 'yii\grid\ActionColumn'],
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


