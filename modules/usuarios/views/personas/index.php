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
<div class="personas-index">

    <p>
        <?= Html::a(Yii::t('app', '<i class="fa fa-plus" aria-hidden="true"></i> Create Personas'), ['create'], ['class' => 'btn btn-success btn_crear']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>



    <?php
    Pjax::begin(['id' => 'some-id-you-like',
//        'timeout' => false,
        'enablePushState' => false,]
//        'clientOptions' => ['method' => 'POST']]
    );
    ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                'filter' => array("" => "Seleccione...","1" => "Activo", "0" => "Inactivo"),
                'value' => function($dataProvider, $key) {
            return Yii::$app->Toolbox->flipSwitch($key, ($dataProvider->status == 0 ? '' : 'checked'));
        }
            ],
//            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>

