<?php

use yii\helpers\Html;
use app\modules\configuraciones\models\TipoDocumento;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">  
    <?php
    $listdata = ArrayHelper::map(TipoDocumento::find()->where(['tributario' => 1])->all(), 'id_tipo_documento', 'nombre');
    echo $form->field($model, 'fk_documento')->dropDownList($listdata, ['prompt' => '', 'id' => 'user_dropdown2']);
    ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <?= $form->field($model, 'rif')->textInput(['maxlength' => true]) ?>
</div>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?= $form->field($model, 'nombre_corto')->textInput(['maxlength' => true]) ?>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model, 'telefono_1')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model, 'telefono_2')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
</div>



<!--<div class="clientes-form">



    


   

  


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



</div>-->
