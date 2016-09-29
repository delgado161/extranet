<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\usuarios\models\Perfiles;
use app\modules\usuarios\models\Personas;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php
    $listdata = ArrayHelper::map(Perfiles::findAll(['status' => '1']), 'id_perfile', 'nombre');
    echo $form->field($model, 'fl_perfil')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'user_dropdown']);
    ?>

    <?php
    $listdata = ArrayHelper::map(Personas::findAll(['status' => '1']), 'id_persona', function($model, $defaultValue) {
                return $model['nombre'] . ' ' . $model['s_nombre'] . ' ' . $model['apellido'] . ' ' . $model['s_apellido'];
            });
    echo $form->field($model, 'fl_persona')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'user_dropdown2']);
    ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->passwordInput() ?>
    <?= $form->field($model, 'validate_clave')->passwordInput() ?>

    <?php echo $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

