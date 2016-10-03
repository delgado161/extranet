<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="menu_lateral">
    <div class="bloque_">
        <i class="fa fa-user" aria-hidden="true"></i> Usuarios 
    </div>
    <div class="bloque_hijos">
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios'], true) ?>'">Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/usuarios/create'], true) ?>'">Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>

    <div class="bloque_">
        <i class="fa fa-users" aria-hidden="true"></i> Personas 
    </div>
    <div class="bloque_hijos">
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas'], true) ?>'">Administrar <i class="fa fa-cogs" aria-hidden="true"></i> </div>
        <div onclick="location.href = '<?php echo Url::to(['/usuarios/personas/create'], true) ?>'">Crear <i class="fa fa-plus" aria-hidden="true"></i> </div>
    </div>


</div>
