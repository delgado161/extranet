<?php

use yii\helpers\Html;
use app\modules\configuraciones\models\TipoDocumento;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">  
    <?php
    $listdata = ArrayHelper::map(TipoDocumento::find()->where(['tributario' => 1])->all(), 'id_tipo_documento', 'nombre');
    echo $form->field($model, 'fk_documento')->widget(Select2::classname(), [
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'addon' => [
            'append' => [
                'content' =>
                Html::button('<i class="fa fa-plus" aria-hidden="true"></i>', ['class' => 'btn btn-success btn_modal', 'data-toggle' => "modal", 'data-target' => "#myModal", 'onclick' => 'src_frame(\'' . Url::to(['/usuarios/personas/create?modal=1'], true) . '\',\'referencia_\')']),
                'asButton' => true
            ]
        ]
    ]);

//    echo $form->field($model, 'fk_documento')->dropDownList($listdata, ['prompt' => '', 'id' => 'user_dropdown2']);
    ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">  
    <?= $form->field($model, 'rif')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    $data = [
        "PUBLICA" => "PÚBLICO",
        "PRIVADA" => "PRIVADO",
        "MIXTA" => "MIXTO",
    ];
    echo $form->field($model, 't_empresa')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Seleccione...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'addon' => [
            'append' => [
                'content' =>
                Html::button('<i class="fa fa-plus" aria-hidden="true"></i>', ['class' => 'btn btn-success btn_modal', 'data-toggle' => "modal", 'data-target' => "#myModal", 'onclick' => 'src_frame(\'' . Url::to(['/usuarios/personas/create?modal=1'], true) . '\',\'referencia_\')']),
                'asButton' => true
            ]
        ]
    ]);
    ?>
</div>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?= $form->field($model, 'nombre_corto')->textInput(['maxlength' => true]) ?>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model, 'telefono_1')->textInput(['maxlength' => true])->widget(MaskedInput::className(), [ 'mask' => '+999 (999) 999-9999',]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model, 'telefono_2')->textInput(['maxlength' => true])->widget(MaskedInput::className(), [ 'mask' => '+999 (999) 999-9999',]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model, 'fax')->textInput(['maxlength' => true])->widget(MaskedInput::className(), [ 'mask' => '+999 (999) 999-9999',]) ?>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->widget(MaskedInput::className(), ['clientOptions' => ['alias' => 'email'],]) ?>
</div>

<!--<div class="clientes-form">



    


   

  


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



</div>-->
