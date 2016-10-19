<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\ClientesSEARCH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'fk_cliente_ref') ?>

    <?= $form->field($model, 'fk_presona_ref') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'nombre_corto') ?>

    <?php // echo $form->field($model, 'telefono_1') ?>

    <?php // echo $form->field($model, 'telefono_2') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'rif') ?>

    <?php // echo $form->field($model, 'nit') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
