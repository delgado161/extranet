<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proyectos')->textInput() ?>

    <?= $form->field($model, 'fk_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_tipo')->textInput() ?>

    <?= $form->field($model, 'fk_lider')->textInput() ?>

    <?= $form->field($model, 'fk_status')->textInput() ?>

    <?= $form->field($model, 'fk_contacto')->textInput() ?>

    <?= $form->field($model, 'fk_contact_alterno')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fl_inicio')->textInput() ?>

    <?= $form->field($model, 'fl_fin')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
