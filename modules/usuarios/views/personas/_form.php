<?php

use yii\helpers\Html;
use app\modules\configuraciones\models\TipoDocumento;
use yii\helpers\ArrayHelper;

use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">  
    <?php
    $listdata = ArrayHelper::map(TipoDocumento::find()->all(), 'id_tipo_documento', 'nombre');
    echo $form->field($model, 'fk_documento')->dropDownList($listdata, ['prompt' => '', 'id' => 'user_dropdown2']);
    ?>


</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<?= $form->field($model, 'n_documento')->textInput(['maxlength' => true]) ?>

</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
        <?=
        $form->field($model, 'genero')->radioList(
                [ 'F' => ' <i class="fa fa-female fa-2x" aria-hidden="true"></i>', 'M' => ' <i class="fa fa-male fa-2x" aria-hidden="true"></i>'], ['item' => function($index, $label, $name, $checked, $value) {
                $return = '<label class="modal-radio">';
                $return .= '<input type="radio"  checked="' . $checked . '"  name="' . $name . '" value="' . $value . '" tabindex="3">';
                $return .= '<span>' . $label . '</span>';
                $return .= '</label>';
                return $return;
            }]);
        ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
        <?php

        echo $form->field($model, 'fl_nacimiento')->widget(yii\jui\DatePicker::classname(), [
            'language' => 'es',
            'clientOptions' => ['dateFormat' => 'dd-mm-yy',],
            'options' => [ 'class' => 'form-control', 'readonly' => "readonly"]
        ])
//        use kartik\widgets\DatePicker;

//echo $form->field($model, 'fl_nacimiento')->widget(DatePicker::classname(), [
//            'options' => [
//                'placeholder' => 'Enter birth date ...',
//                'class' => 'form-control', 'readonly' => "readonly"],
//    
//            'pluginOptions' => [
//                'autoclose' => true,
//                
//            ]
//        ]);
        ?>


    </div>
</div>












<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">  
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email_corporativo')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
<?= $form->field($model, 's_nombre')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 's_apellido')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'email_personal')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">  
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;">  
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
<?= $form->field($model, 'telefono_2')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;">  
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
            <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
<?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
</div>




