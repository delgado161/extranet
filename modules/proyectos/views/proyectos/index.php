<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\proyectos\models\ProyectosSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyectos');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="proyectos-index panel_up"  >

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
                'columns' => [
                    'nombre',
                    'descripcion:ntext',
                    'fk_cliente',
                    'fk_tipo',
                    'fk_status',
//                    ['class' => 'yii\grid\SerialColumn'],
//                    'id_proyectos',
//                   
//                   
//                    'fk_lider',
//                
                    // 'fk_contacto',
                    // 'fk_contact_alterno',
                    // 'Keywords:ntext',
                    // 'fl_inicio',
                    // 'fl_fin',
                    // 'status',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 200px;'],
                        'header' => 'Acciones',
                        'template' => '{aprobar} {view} {update} {delete}',
                        'buttons' => [
                            'aprobar' => function ($url, $model) {
                                return Html::a('<i class="fa fa-check-circle" aria-hidden="true" style="font-size:20px;"></i>', $url, ['class' => 'btn btn-success btn-xs']);
                            },
                            
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



