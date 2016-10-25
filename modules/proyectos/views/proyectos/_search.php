<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\ProyectosSEARCH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_proyectos') ?>

    <?= $form->field($model, 'fk_cliente') ?>

    <?= $form->field($model, 'fk_tipo') ?>

    <?= $form->field($model, 'fk_lider') ?>

    <?= $form->field($model, 'fk_status') ?>

    <?php // echo $form->field($model, 'fk_contacto') ?>

    <?php // echo $form->field($model, 'fk_contact_alterno') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'Keywords') ?>

    <?php // echo $form->field($model, 'fl_inicio') ?>

    <?php // echo $form->field($model, 'fl_fin') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
