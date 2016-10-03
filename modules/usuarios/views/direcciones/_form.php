<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Direcciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="direcciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lp_direccion_id')->textInput() ?>

    <?= $form->field($model, 't_urban_barr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urbarn_barrio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_calle_av')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle_av')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipovivienda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datovivienda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piso_numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oficin_apart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lf_direccion_ptoreferencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codpostal')->textInput() ?>

    <?= $form->field($model, 'claveforeana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tabla_referen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lf_direccion_parroquia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visibilidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
