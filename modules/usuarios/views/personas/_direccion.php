<?php

use app\modules\usuarios\models\Ptoreferencias;
use yii\helpers\ArrayHelper;
use \app\modules\configuraciones\models\Paises;

// var_dump($model_direcciones->attributes); 
?>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    $listdata = ArrayHelper::map(Paises::find()->all(), 'lp_pais_id', 'nombre');
    echo $form->field($model_direcciones, 'pais')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'pais_',
        'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('/usuarios/direcciones/estado') . '",{id: $(this).val()} ,function( data ) {
                  $( "#estados_" ).html( data );
                });
            ']);
    ?>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    echo $form->field($model_direcciones, 'estado')->dropDownList(array(), ['prompt' => 'Seleccione...', 'id' => 'estados_',
        'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('/usuarios/direcciones/municipio') . '",{id: $(this).val()} ,function( data ) {
                  $( "#municipio_" ).html( data );
                });
            ']);
    ?>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    echo $form->field($model_direcciones, 'municipio')->dropDownList(array(), ['prompt' => 'Seleccione...', 'id' => 'municipio_',
        'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('/usuarios/direcciones/parroquia') . '",{id: $(this).val()} ,function( data ) {
                  $( "#parroquia_" ).html( data );
                });
            ']);
    ?>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    echo $form->field($model_direcciones, 'lf_direccion_parroquia')->dropDownList(array(), ['prompt' => 'Seleccione...', 'id' => 'parroquia_',
    ]);
    ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <br>
    <br>
</div>



<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?=
    $form->field($model_direcciones, 't_urban_barr')->radioList(
            [ 'BARRIO' => ' Barrio', 'SECTOR' => ' Sector', 'URBANIZACION' => ' Urbanización'], ['item' => function($index, $label, $name, $checked, $value) {
            $return = '<label class="modal-radio">';
            $return .= '<input type="radio"  checked="' . $checked . '"  name="' . $name . '" value="' . $value . '" tabindex="3">';
            $return .= '<span>' . $label . '</span>';
            $return .= '</label> &nbsp;&nbsp;&nbsp;';
            return $return;
        }]);
    ?>
</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">  
    <?= $form->field($model_direcciones, 'urbarn_barrio')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?=
    $form->field($model_direcciones, 't_calle_av')->radioList(
            [ 'AVENIDA' => ' Avenida', 'CALLE' => ' Calle'], ['item' => function($index, $label, $name, $checked, $value) {
            $return = '<label class="modal-radio">';
            $return .= '<input type="radio"  checked="' . $checked . '"  name="' . $name . '" value="' . $value . '" tabindex="3">';
            $return .= '<span>' . $label . '</span>';
            $return .= '</label> &nbsp;&nbsp;&nbsp;';
            return $return;
        }]);
    ?>
</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">  
    <?= $form->field($model_direcciones, 'calle_av')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?=
    $form->field($model_direcciones, 'tipovivienda')->radioList(
            [ 'CASA' => ' Casa', 'EDIFICIO' => ' Edificio'], ['item' => function($index, $label, $name, $checked, $value) {
            $return = '<label class="modal-radio">';
            $return .= '<input type="radio"  checked="' . $checked . '"  name="' . $name . '" value="' . $value . '" tabindex="3">';
            $return .= '<span>' . $label . '</span>';
            $return .= '</label> &nbsp;&nbsp;&nbsp;';
            return $return;
        }]);
    ?>
</div>

<!--lf_direccion_ptoreferencia-->

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">  
    <?= $form->field($model_direcciones, 'datovivienda')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model_direcciones, 'piso_numero')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model_direcciones, 'oficin_apart')->textInput(['maxlength' => true]) ?>
</div>  
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?= $form->field($model_direcciones, 'codpostal')->textInput(['maxlength' => true]) ?>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
    <?php
    $listdata = ArrayHelper::map(Ptoreferencias::find()->all(), 'lp_ptoreferencia_id', 'nombre');
    echo $form->field($model_direcciones, 'lf_direccion_ptoreferencia')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'lp_ptoreferencia_id' => 'nombre']);
    ?>
</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">  
    <?= $form->field($model_direcciones, 'referencia')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <br>
    <br>
    <div id="map" style="width:100%;height:500px"></div>
    <br>
    <br>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
  <?= $form->field($model_direcciones, 'lat')->textInput(['style' => 'display:none;'])->label(false) ?>
     <?= $form->field($model_direcciones, 'lng')->textInput(['style' => 'display:none;'])->label(false) ?>
</div>