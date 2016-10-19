<?php

use \app\modules\usuarios\models\Personas;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\modules\clientes\models\Clientes;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?php
    $listdata = ArrayHelper::map(Personas::findAll(['status' => '1']), 'id_persona', function($model, $defaultValue) {
                return $model['nombre'] . ' ' . $model['s_nombre'] . ' ' . $model['apellido'] . ' ' . $model['s_apellido'];
            });

    echo '<label class="control-label">Persona</label>';
    echo Select2::widget([
        'name' => 'Clientes[fk_presona_ref]',
        'value' => $model->fk_cliente_ref, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...',
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>
</div>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <?php
    $listdata = ArrayHelper::map(Clientes::findAll(['status' => '1']), 'id_cliente');

    echo '<br><label class="control-label">Cliente</label>';
    echo Select2::widget([
        'name' => 'Clientes[fk_cliente_ref]',
        'value' => $model->fk_cliente_ref, // initial value
        'data' => $listdata,
        'options' => ['placeholder' => 'Seleccione...',
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>
</div>



