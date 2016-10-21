<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\usuarios\models\Perfiles;
use app\modules\usuarios\models\Personas;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\password\PasswordInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form" >



    <?php $form = ActiveForm::begin([]);
    ?>

    <?php
    $listdata = ArrayHelper::map(Perfiles::findAll(['status' => '1']), 'id_perfile', 'nombre');

//    echo $form->field($model, 'fl_perfil')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'user_dropdown']);

    use kartik\select2\Select2;

// Normal select with ActiveForm & model
    echo $form->field($model, 'fl_perfil')->widget(Select2::classname(), [
        'data' => $listdata,
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'perfil_'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'addon' => [
            'append' => [
                'content' =>
                Html::button('<i class="fa fa-plus" aria-hidden="true"></i>', ['class' => 'btn btn-success btn_modal', 'data-toggle' => "modal", 'data-target' => "#myModal", 'onclick' => 'src_frame(\'' . '' . '\',\'perfil_\')']),
                'asButton' => true
            ]
        ]
    ]);
    ?>

    <?php
    $listdata = ArrayHelper::map(Personas::findAll(['status' => '1']), 'id_persona', function($model, $defaultValue) {
                return $model['nombre'] . ' ' . $model['s_nombre'] . ' ' . $model['apellido'] . ' ' . $model['s_apellido'];
            });
//    echo $form->field($model, 'fl_persona')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'user_dropdown2']);
    echo $form->field($model, 'fl_persona')->widget(Select2::classname(), [
        'data' => $listdata,
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'persona_'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'addon' => [
            'append' => [
                'content' =>
                Html::button('<i class="fa fa-plus" aria-hidden="true"></i>', ['class' => 'btn btn-success btn_modal', 'data-toggle' => "modal", 'data-target' => "#myModal", 'onclick' => 'src_frame(\'' . Url::to(['/usuarios/personas/create?modal=1'], true) . '\',\'persona_\')']),
                'asButton' => true
            ]
        ]
    ]);
    ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>


    <?php
//    use kartik\widgets\ActiveForm; // optional
    if ($model->isNewRecord) {
        echo $form->field($model, 'clave')->widget(PasswordInput::classname(), Yii::$app->Toolbox->Parametros_password());
        ?>
        <?= $form->field($model, 'validate_clave')->passwordInput() ?>
    <?php } ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn_accione">
        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-ban" aria-hidden="true"></i>', ['/usuarios/usuarios/'], ['class' => 'btn btn-danger']) ?>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

