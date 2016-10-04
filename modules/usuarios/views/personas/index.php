<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\usuarios\models\PersonasSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Personas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index" style="margin-top: 90px;">


    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-iconos_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-iconos_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-filter" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_filter']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-plus" aria-hidden="true"></i>'), ['create'], ['class' => 'btn_crear', 'style' => 'color:#58B02F']) ?>

        </div>
        <div class="panel-body">
            <?php
            Pjax::begin(['id' => $searchModel->tableName() . "grid",
//        'timeout' => false,
                'enablePushState' => false,]
            );
            ?>    <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\CheckboxColumn',
                        'contentOptions' => ['style' => 'width: 15px;text-align:center;','class' => '_chkbox'],
                    ],
//                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'nombre_persona',
                        'value' => function($dataProvider) {
                            return $dataProvider->nombre . " " . $dataProvider->s_nombre;
                        }
                    ],
                    [
                        'attribute' => 'apellido_persona',
                        'value' => function($dataProvider) {
                            return $dataProvider->apellido . " " . $dataProvider->s_apellido;
                        }
                    ],
//            'id_persona',
                    'fk_cargo',
//            'nombre',
//            's_nombre',
//            'apellido',
                    // 's_apellido',
//             'email_personal:email',
                    'email_corporativo:email',
                    // 'telefono',
                    // 'celular',
//            [
//                'attribute' => 'fl_nacimiento',
//                'format' => 'raw',
//                'value' => function($dataProvider) {
//                    return '<i class = "fa fa-birthday-cake fa-2x" aria-hidden = "true"></i> ' . $dataProvider->fl_nacimiento;
//                }
//            ],
                    // 'observaciones:ntext',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 115px;'],
                        'filter' => array( "1" => "Activo", "0" => "Inactivo"),
                        'value' => function($dataProvider, $key) {
                    return Yii::$app->Toolbox->flipSwitch($key, ($dataProvider->status == 0 ? '' : 'checked'));
                }
                    ],
//            'status',
//                    ['class' => 'yii\grid\ActionColumn'],
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
                                return Html::a('<i class = "fa fa-pencil-square-o" aria-hidden = "true" style="font-size:20px;"></i>', $url, ['class' => 'btn btn-warning btn-xs']);
                            },
                                    'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-times-circle" aria-hidden="true" style="font-size:20px;">', $url, ['class' => 'btn btn-danger btn-xs']);
                            },
                                ],]
                        ],
                    ]);
                    ?>

                    <?php
                    $this->registerJS("print_checkbox2('" . $searchModel->tableName() . "grid" . "')");
                    ?>


                    <?php Pjax::end(); ?>
                </div>
            </div>


                        <!--    <p>
                            </p>-->

            <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>






</div>

