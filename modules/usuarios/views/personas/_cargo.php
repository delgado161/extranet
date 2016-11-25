<?php

use yii\helpers\ArrayHelper;
use \app\modules\usuarios\models\Cargos;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="personas-form">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <?php
        $listdata = ArrayHelper::map(Cargos::find()->all(), 'id_cargo', 'cargo');
//        echo $form->field($model, 'fk_cargo')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'dropdown_fk_cargo']);

        echo $form->field($model, 'fk_cargo')->widget(Select2::classname(), [
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

        <?= $form->field($model, 'observaciones')->textArea(['rows' => '8']) ?>




    </div>
</div>