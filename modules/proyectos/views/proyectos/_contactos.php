<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use \app\modules\usuarios\models\Personas;
use kartik\select2\Select2;
use app\modules\clientes\models\Clientes;
?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  


    <?php
    $listdata = ArrayHelper::map(Clientes::findAll(['status' => '1']), 'id_cliente', 'nombre');


    echo $form->field($model, 'fk_cliente')->widget(Select2::classname(), [
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
    ?>
    <br>


    <?php
    $listdata = ArrayHelper::map(Personas::findAll(['status' => '1']), 'id_persona', function($model, $defaultValue) {
                return $model['nombre'] . ' ' . $model['s_nombre'] . ' ' . $model['apellido'] . ' ' . $model['s_apellido'];
            });


    echo $form->field($model, 'fk_lider')->widget(Select2::classname(), [
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
    ?>
    </br>

    <?php
    echo $form->field($model, 'fk_contacto')->widget(Select2::classname(), [
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
    ?>
    </br>

    <?php
    echo $form->field($model, 'fk_contact_alterno')->widget(Select2::classname(), [
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
    ?>
    </br>

    <?php // echo $form->field($model, 'fk_contacto')->textInput()  ?>

    <?php // echo $form->field($model, 'fk_contact_alterno')->textInput()  ?>

</div>