<?php 

use yii\helpers\ArrayHelper;
use \app\modules\usuarios\models\Cargos;
?>

<div class="personas-form">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <?php
        $listdata = ArrayHelper::map(Cargos::find()->all(), 'id_cargo', 'cargo');
        echo $form->field($model, 'fk_cargo')->dropDownList($listdata, ['prompt' => 'Seleccione...', 'id' => 'dropdown_fk_cargo']);
        ?>

       <?= $form->field($model, 'observaciones')->textArea(['rows' => '8']) ?>


    </div>
</div>