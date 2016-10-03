<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\DireccionesSEARCH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="direcciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lp_direccion_id') ?>

    <?= $form->field($model, 't_urban_barr') ?>

    <?= $form->field($model, 'urbarn_barrio') ?>

    <?= $form->field($model, 't_calle_av') ?>

    <?= $form->field($model, 'calle_av') ?>

    <?php // echo $form->field($model, 'tipovivienda') ?>

    <?php // echo $form->field($model, 'datovivienda') ?>

    <?php // echo $form->field($model, 'piso_numero') ?>

    <?php // echo $form->field($model, 'oficin_apart') ?>

    <?php // echo $form->field($model, 'lf_direccion_ptoreferencia') ?>

    <?php // echo $form->field($model, 'referencia') ?>

    <?php // echo $form->field($model, 'codpostal') ?>

    <?php // echo $form->field($model, 'claveforeana') ?>

    <?php // echo $form->field($model, 'tabla_referen') ?>

    <?php // echo $form->field($model, 'lf_direccion_parroquia') ?>

    <?php // echo $form->field($model, 'visibilidad') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
