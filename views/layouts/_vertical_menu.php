<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="menu_lateral">
    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i class="fa fa-user" aria-hidden="true"></i> </button> Usuarios <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div class="guia_" style="" ></div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios'], true) ?>'"><div class="guia2_"></div>Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios/create'], true) ?>'"><div class="guia2_"></div>Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>

    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i class="fa fa-users" aria-hidden="true"></i> </button> Personas <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div class="guia_" style="" ></div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas'], true) ?>'"><div class="guia2_"></div>Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas/create'], true) ?>'"><div class="guia2_"></div>Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>


</div>
