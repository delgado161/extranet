<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="menu_lateral">
    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i style="font-size: 28px;" class="icon-joker_Personas" aria-hidden="true"></i> </button> Usuarios <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div class="guia_" style="" ></div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios'], true) ?>'"><div class="guia2_"></div>Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios/create'], true) ?>'"><div class="guia2_"></div>Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>

    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i style="font-size: 28px;" class="icon-joker_grupo" aria-hidden="true"></i> </button> Personas <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div class="guia_" style="" ></div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas'], true) ?>'"><div class="guia2_"></div>Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas/create'], true) ?>'"><div class="guia2_"></div>Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>

    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i style="font-size: 28px;" class="icon-joker_edificio" aria-hidden="true"></i> </button> Clientes <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div class="guia_" style="" ></div>
        <div onclick="location.href = '<?php echo Url::to(['/clientes/clientes'], true) ?>'"><div class="guia2_"></div>Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/clientes/clientes/create'], true) ?>'"><div class="guia2_"></div>Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>

    <div class="bloque_">
        <button type="button" class="btn btn_vert_"><i style="font-size: 28px;" class="icon-joker_portafolio2" aria-hidden="true"></i> </button> Proyectos <i class="fa fa-caret-down fl_down" aria-hidden="true"></i> 
    </div>
    <div class="bloque_hijos">
        <div class="guia_" style="" ></div>
        <div onclick="location.href = '<?php echo Url::to(['/proyectos/proyectos'], true) ?>'"><div class="guia2_"></div>Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/proyectos/proyectos/create'], true) ?>'"><div class="guia2_"></div>Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/proyectos/proyectos/r'], true) ?>'"><div class="guia2_"></div>Mis Proyectos <span class="badge" >42</span> </div>

    </div>


</div>
