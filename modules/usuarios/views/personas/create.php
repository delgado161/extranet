<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Personas */

$this->title = Yii::t('app', 'Create Personas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="personas-create" style="margin-top: 90px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $form = ActiveForm::begin([
                'options' => [ 'id' => 'prueba__',
                    'enctype' => 'multipart/form-data'],
    ]);
    ?>

    <div class="col-md-12 bhoechie-tab-container bhoechie-tab-container">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
            <div class="list-group">
                <div class="list-group-item text-center tab_new" onclick="$('#submit_personas').hide();">
                    <i class="fa fa-street-view fa-2x" aria-hidden="true"></i><br/>Usuario
                </div>
                <div class="list-group-item text-center tab_new" onclick="$('#submit_personas').hide();">
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i><br/>Dirección
                </div>
                <div class="list-group-item text-center tab_new" onclick="$('#submit_personas').show();">
                    <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><br/>Foto
                </div>
                <div class="list-group-item text-center tab_new" onclick="$('#submit_personas').show();">
                    <i class="fa fa-building-o fa-2x" aria-hidden="true"></i><br/>Trabajo
                </div>


            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
            <div class="bhoechie-tab-content active">
                <?= $this->render('_form', ['model' => $model, 'form' => $form]) ?>
            </div>
            <div class="bhoechie-tab-content" >
                <?= $this->render('_direccion', ['model' => $model, 'form' => $form]) ?>
            </div>
            <div class="bhoechie-tab-content">
                <?= $this->render('_imagen', ['model' => $model, 'form' => $form]) ?>
 
            </div>
            <div class="bhoechie-tab-content">
                <?= $this->render('_cargo', ['model' => $model, 'form' => $form]) ?>
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <br>

            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['style' => 'display:none;', 'id' => 'submit_btn', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>



</div>



<script>

    var map;
    var mapDiv = document.getElementById('map');
    var myLatlng = {lat: -25.363, lng: 131.044};
    var markers = [];

    function initMap() {
        map = new google.maps.Map(mapDiv, {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });



        map.addListener('click', function (event) {
//            alert(event.latLng.lat());
            clearMarkers();
            addMarker(event.latLng);

        });
    }

</script>




