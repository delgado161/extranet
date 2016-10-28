<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\modules\configuraciones\models\TipoProyecto;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">



    <?php // echo $form->field($model, 'fk_lider')->textInput()  ?>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
        <?php
        $listdata = ArrayHelper::map(TipoProyecto::findAll(['status' => '1']), 'id_tipo_proyecto', 'nombre');

        echo '<label class="control-label">Tipo de Proyecto</label>';
        echo Select2::widget([
            'name' => 'Proyectos[fk_tipo]',
            'value' => $model->fk_tipo, // initial value
            'data' => $listdata,
            'options' => ['placeholder' => 'Seleccione...',
            ],
            'pluginOptions' => [
                'allowClear' => true,
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
        <br>
    </div>







    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
        <?php echo $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        
            
            <?php
        // echo $form->field($model, 'fk_status')->textInput() 
//$leadsCount = TipoProyecto::find(['status' => '1'])->count();
//
//echo "sdddddd".var_dump($leadsCount);
        ?>

        <?php echo $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        <?php echo $form->field($model, 'Keywords')->textarea(['rows' => 6]) ?>

        <?php // echo $form->field($model, 'status')->textInput()   ?>
        <?php // echo $form->field($model, 'id_proyectos')->textInput()  ?>

    </div>

    <!--    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php // echo $form->field($model, 'fl_inicio')->textInput()  ?>
        </div>
    
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php // echo $form->field($model, 'fl_fin')->textInput()  ?>
        </div>-->

    <!--
        <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>-->



</div>
