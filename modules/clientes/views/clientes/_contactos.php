<?php

use \app\modules\usuarios\models\Personas;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\modules\clientes\models\Clientes;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?php
    $listdata = ArrayHelper::map(Personas::findAll(['status' => '1']), 'id_persona', function($model, $defaultValue) {
                return $model['nombre'] . ' ' . $model['s_nombre'] . ' ' . $model['apellido'] . ' ' . $model['s_apellido'];
            });

    echo '<label class="control-label">Contacnto</label>';
    echo Select2::widget([
        'name' => 'Clientes[fk_presona_ref]',
        'value' => $model->fk_cliente_ref, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...', 'id' => 'List_Clientes', 'class' => 'List_'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'addon' => [
            'append' => [
                'content' =>
                Html::button('<i class="fa fa-check" aria-hidden="true"></i>', ['class' => 'btn btn-primary add_select', 'style' => 'display:none']) .
                Html::button('<i class="fa fa-plus" aria-hidden="true"></i>', ['class' => 'btn btn-success btn_modal', 'data-toggle' => "modal", 'data-target' => "#myModal", 'onclick' => 'src_frame(\'' . Url::to(['/usuarios/personas/create?modal=1'], true) . '\',\'List_Clientes\')']),
                'asButton' => true
            ]
        ]
    ]);
    ?>
</div>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <br>
    <div class="panel panel-default">
        <div class="panel-heading" style=" background: rgba(51, 51, 51, 0.25) !important;">
            <h3 class="panel-title">Lista de Contactos</h3>
        </div>
        <div class="panel-body">
            <div id="List_Clientes_select">
                <?php
                foreach ($Lista_contactos as $key => $valor) {
                    echo '<div class="form-group field-clientes-fk_presona_ref has-success"><div class=""><div class="input-group"><input readonly id="' . $key . '" value="' . $valor . '" type="text" class="form-control" name="List_Clientes[' . $key . ']"><span class="input-group-btn"><button type="button" class="btn btn-danger list_delete" id="btn_lst' . $key . '" onclick="delete_list(this.id,\'List_Clientes_select\')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></span></div><div class="help-block"></div></div></div>';
                    $this->registerJS( ' $("#List_Clientes option[value=\''.$key.'\']").remove();');
                }
                ?>

                <span class="SN_LISTA" style="<?= (!empty($Lista_contactos) ? 'display:none' : '') ?>">Aun no se ha agregado persona de contacto<br></span>
            </div>
        </div>
    </div>



    <?php
//    echo $form->field($model, 'fk_presona_ref', [
//        'addon' => [
//            'append' => [
//                'content' => Html::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['class' => 'btn btn-danger']),
//                'asButton' => true
//            ]
//        ]
//    ]);
//    echo $form->field($model, 'fk_presona_ref', [
//        'addon' => [
//            'append' => [
//                'content' => Html::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['class' => 'btn btn-danger']),
//                'asButton' => true
//            ]
//        ]
//    ])->label(false);
//
//    echo $form->field($model, 'fk_presona_ref', [
//        'addon' => [
//            'append' => [
//                'content' => Html::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['class' => 'btn btn-danger']),
//                'asButton' => true
//            ]
//        ]
//    ])->label(false);
//
//    echo $form->field($model, 'fk_presona_ref', [
//        'addon' => [
//            'append' => [
//                'content' => Html::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['class' => 'btn btn-danger']),
//                'asButton' => true
//            ]
//        ]
//    ])->label(false);
    ?>
</div>



