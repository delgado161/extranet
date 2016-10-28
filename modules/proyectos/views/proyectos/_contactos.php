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

    echo '<label class="control-label">Cliente</label>';
    echo Select2::widget([
        'name' => 'Proyectos[fk_cliente]',
        'value' => $model->fk_cliente, // initial value
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


    <?php
    $listdata = ArrayHelper::map(Personas::findAll(['status' => '1']), 'id_persona', function($model, $defaultValue) {
                return $model['nombre'] . ' ' . $model['s_nombre'] . ' ' . $model['apellido'] . ' ' . $model['s_apellido'];
            });

    echo '<label class="control-label">Lider</label>';
    echo Select2::widget([
        'name' => 'Proyectos[fk_lider]',
        'value' => $model->fk_lider, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'referencia_'
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
    </br>

    <?php

    echo '<label class="control-label">Lider</label>';
    echo Select2::widget([
        'name' => 'Proyectos[fk_contacto]',
        'value' => $model->fk_contacto, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'referencia_3'
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
    </br>

    <?php

    echo '<label class="control-label">Lider</label>';
    echo Select2::widget([
        'name' => 'Proyectos[fk_contact_alterno]',
        'value' => $model->fk_contact_alterno, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'referencia_2'
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
    </br>

    <?php // echo $form->field($model, 'fk_contacto')->textInput() ?>

    <?php // echo $form->field($model, 'fk_contact_alterno')->textInput() ?>

</div>