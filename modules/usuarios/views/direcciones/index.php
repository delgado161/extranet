<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\usuarios\models\DireccionesSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Direcciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direcciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Direcciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lp_direccion_id',
            't_urban_barr',
            'urbarn_barrio',
            't_calle_av',
            'calle_av',
            // 'tipovivienda',
            // 'datovivienda',
            // 'piso_numero',
            // 'oficin_apart',
            // 'lf_direccion_ptoreferencia',
            // 'referencia',
            // 'codpostal',
            // 'claveforeana',
            // 'tabla_referen',
            // 'lf_direccion_parroquia',
            // 'visibilidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
