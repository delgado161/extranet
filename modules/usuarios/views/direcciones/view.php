<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Direcciones */

$this->title = $model->lp_direccion_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Direcciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direcciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->lp_direccion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->lp_direccion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'lp_direccion_id',
            't_urban_barr',
            'urbarn_barrio',
            't_calle_av',
            'calle_av',
            'tipovivienda',
            'datovivienda',
            'piso_numero',
            'oficin_apart',
            'lf_direccion_ptoreferencia',
            'referencia',
            'codpostal',
            'claveforeana',
            'tabla_referen',
            'lf_direccion_parroquia',
            'visibilidad',
        ],
    ]) ?>

</div>
