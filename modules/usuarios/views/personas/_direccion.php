<?php

use app\modules\usuarios\models\Ptoreferencias;
use yii\helpers\ArrayHelper;
use \app\modules\configuraciones\models\Paises;
use app\modules\configuraciones\models\Estados;
use app\modules\configuraciones\models\Municipios;
use \app\modules\configuraciones\models\Parroquias;
use kartik\select2\Select2;

// var_dump($model_direcciones->attributes); 
?>

<?php list($pais, $estado, $municipio, $parroquia) = Yii::$app->Toolbox->buscar_PME($model_direcciones->lf_direccion_parroquia); ?>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    $listdata = ArrayHelper::map(Paises::find()->all(), 'lp_pais_id', 'nombre');

    echo '<label class="control-label">Pais</label>';
    echo Select2::widget([
        'name' => 'Direcciones[pais]',
        'value' => $pais->lp_pais_id, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'pais_',
            'onchange' => 'onchange_pais(\'' . Yii::$app->urlManager->createUrl('/usuarios/direcciones/estado') . '\')'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <?php
    if (!empty($pais->lp_pais_id))
        $listdata = ArrayHelper::map(\app\modules\configuraciones\models\Estados::find()->all(), 'lp_estado_id', 'nombre');
    else
        $listdata = [];

    echo '<label class="control-label">Estado</label>';
    echo Select2::widget([
        'name' => 'Direcciones[estado]',
        'data' => $listdata,
        'value' => $estado->lp_estado_id, // initial value
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'estados_',
            'onchange' => 'onchange_estado(\'' . Yii::$app->urlManager->createUrl('/usuarios/direcciones/municipio') . '\')'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
    <br>
    <?php
    if (!empty($municipio->lp_municipio_id))
        $listdata = ArrayHelper::map(Municipios::find()->all(), 'lp_municipio_id', 'nombre');
    else
        $listdata = [];

    echo '<label class="control-label">Municipio</label>';
    echo Select2::widget([
        'name' => 'Direcciones[municipio]',
        'data' => $listdata,
        'value' => $municipio->lp_municipio_id, // initial value
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'municipio_',
            'onchange' => 'onchange_municipio(\'' . Yii::$app->urlManager->createUrl('/usuarios/direcciones/parroquia') . '\')'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
    <br>
    <!--    <div class="form-group field-direcciones-lf_direccion_parroquia required">-->
    <?php
    if (!empty($model_direcciones->lf_direccion_parroquia))
        $listdata = ArrayHelper::map(Parroquias::find()->all(), 'lp_parroquia_id', 'nombre');
    else
        $listdata = [];

    echo $form->field($model_direcciones, 'lf_direccion_parroquia')->widget(Select2::classname(), [
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
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
            ['BARRIO' => ' Barrio', 'SECTOR' => ' Sector', 'URBANIZACION' => ' Urbanización'], ['item' => function($index, $label, $name, $checked, $value) {
            $return = '<label class="modal-radio">';
            $return .= '<input type="radio"  checked="' . $checked . '"  name="' . $name . '" value="' . $value . '" tabindex="3">';
            $return .= '<span>' . $label . '</span>';
            $return .= '</label> &nbsp;&nbsp;&nbsp;';
            return $return;
        }]);
    ?>

    <?=
    $form->field($model_direcciones, 't_calle_av')->radioList(
            ['AVENIDA' => ' Avenida', 'CALLE' => ' Calle'], ['item' => function($index, $label, $name, $checked, $value) {
            $return = '<label class="modal-radio">';
            $return .= '<input type="radio"  checked="' . $checked . '"  name="' . $name . '" value="' . $value . '" tabindex="3">';
            $return .= '<span>' . $label . '</span>';
            $return .= '</label> &nbsp;&nbsp;&nbsp;';
            return $return;
        }]);
    ?>

    <?=
    $form->field($model_direcciones, 'tipovivienda')->radioList(
            ['CASA' => ' Casa', 'EDIFICIO' => ' Edificio'], ['item' => function($index, $label, $name, $checked, $value) {
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
    <?= $form->field($model_direcciones, 'calle_av')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model_direcciones, 'datovivienda')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <br>
    <br>
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
    <?= $form->field($model_direcciones, 'lat')->textInput(['style' => 'display:none;', 'id' => 'direcciones-lat'])->label(false) ?>
    <?= $form->field($model_direcciones, 'lng')->textInput(['style' => 'display:none;', 'id' => 'direcciones-lng'])->label(false) ?>
</div>