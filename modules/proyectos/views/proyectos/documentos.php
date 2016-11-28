<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\sortable\Sortable;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\Proyectos */

$this->title = 'Documentos';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

$("#input-id").fileinput();

// with plugin options
$("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});


<?php
$form = ActiveForm::begin([
            'options' => [ 'id' => 'sd' . "_form",
                'class' => 'tab_validate',
                'enctype' => 'multipart/form-data'
            ],
        ]);
?>


<div class="proyectos-view panel_up">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;'])  ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;'])  ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red'])  ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_editar" aria-hidden="true"></i>'), ['update', 'id' => $model->id_persona], ['class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #EC971F;'])  ?>    

        </div>
        <div class="panel-body">
            <!--            <div class="div_list" style="">
                            <div class="titulo_list" style=""> Proyecto </div><?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['/clientes/clientes/update', 'id' => $model->id_proyectos], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-right:10px;font-size: 25px; margin-top: 6px;color: white;']) ?>    
                        </div>-->
            <?php

            use kartik\widgets\FileInput;
// or 'use kartikile\FileInput' if you have only installed yii2-widget-fileinput in isolation
            use yii\helpers\Url;

// Ajax uploads with drag and drop feature. Enable AJAX uploads by setting the `uploadUrl` property 
// in pluginOptions. You can also pass extra data to your upload URL via `uploadExtraData`. Refer 
// [plugin documentation and demos](http://plugins.krajee.com/file-input/demo) for more details 
// and options on using AJAX uploads.


            echo FileInput::widget([
                'name' => 'Proyectos[imageFile]',
                'options' => [
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/proyectos/proyectos/documentos']),
                    'allowedFileExtensions' => ['jpg', 'gif', 'png','pdf','JPG','PNG','GIF','PDF','docx','DOCX','doc','DOC'],
                    'maxFileCount' => 10,
                    'maxFileSize' => 3000
                ]
            ]);
            ?>



            <br>
            <?php
//            echo Sortable::widget([
//                'type' => 'grid',
//                'items' => [
//                    ['options' => ['class' => 'sortable_color_1'], 'content' => '<div class="grid-item" ><i style="font-size: 120px;color:white;" class="icon-joker_Proyectos" aria-hidden="true"></i><br><h4>Actividades</h4></div>'],
//                    ['options' => ['class' => 'sortable_color_2'], 'content' => '<div class="grid-item"><i style="font-size: 120px;color:white;" class="icon-joker__libreta-22" aria-hidden="true"></i><br><h4>Contactos</h4></div>'],
//                    ['options' => ['class' => 'sortable_color_3'], 'content' => '<div class="grid-item"><i style="font-size: 120px;color:white;" class="icon-joker_graficas" aria-hidden="true"></i><br><h4>Reportes</h4></div>'],
//                    ['options' => ['class' => 'sortable_color_4'], 'content' => '<div onclick="location.href=\'documentos/\'" class="grid-item"><i style="font-size: 120px;color:white;" class="icon-joker_Archivar" aria-hidden="true"></i><br><h4>Documentos</h4></div>'],
//                ]
//            ]);
            ?>







        </div>
    </div>
</div>
</div>


<?php ActiveForm::end(); ?>

