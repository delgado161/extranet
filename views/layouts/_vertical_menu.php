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
        <div class="guia_" style="   
             float: left;
             width: -15px;
             /* background: rebeccapurple; */
             margin-left: -27px;
             border-right: 2px solid white;" >

        </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios'], true) ?>'">Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios/create'], true) ?>'">Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>

    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i class="fa fa-users" aria-hidden="true"></i> </button> Personas <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas'], true) ?>'">Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas/create'], true) ?>'">Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>


</div>
