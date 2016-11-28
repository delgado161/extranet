<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\sortable\Sortable;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\Proyectos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="proyectos-view panel_up">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red'])  ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_editar" aria-hidden="true"></i>'), ['update', 'id' => $model->id_persona], ['class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #EC971F;'])  ?>    

        </div>
        <div class="panel-body">
            <div class="div_list" style="">
                <div class="titulo_list" style=""> Proyecto </div><?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['/clientes/clientes/update', 'id' => $model->id_proyectos], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-right:10px;font-size: 25px; margin-top: 6px;color: white;']) ?>    
            </div>



            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'nombre',
                    'descripcion:ntext',
//                   
//                    [
//                        'label' => 'Lider',
//                        'format' => 'raw',
//                        'value' => $model->fkLider->nombre,
//                    ],
                    [
                        'label' => 'Tipo',
                        'format' => 'raw',
                        'value' => $model->fkTipo->nombre,
                    ],
                    [
                        'label' => 'Estatus',
                        'format' => 'raw',
                        'value' => $model->fkStatus->nombre ,
                    ],
//                    'fk_status',
//                    'fk_contacto',
//                    'fk_contact_alterno',
                    'fl_inicio',
                    'fl_fin',
                     [
                        'label' => 'Tiempo',
                        'format' => 'raw',
                        'value' => $model->tiempo." ".Yii::$app->Toolbox->var_tiempo(),
                    ],
                    'Keywords:ntext',
                    [
                        'label' => 'Cliente',
                        'format' => 'raw',
                        'value' => $model->fkCliente->nombre,
                    ],
//                    'status',
                ],
            ])
            ?>
            <br>
            <?php
            echo Sortable::widget([
                'type' => 'grid',
                'items' => [
                    ['options' => ['class' => 'sortable_color_1'], 'content' => '<div class="grid-item" ><i style="font-size: 120px;color:white;" class="icon-joker_Proyectos" aria-hidden="true"></i><br><h4>Actividades</h4></div>'],
                    ['options' => ['class' => 'sortable_color_2'], 'content' => '<div class="grid-item"><i style="font-size: 120px;color:white;" class="icon-joker__libreta-22" aria-hidden="true"></i><br><h4>Contactos</h4></div>'],
                    ['options' => ['class' => 'sortable_color_3'], 'content' => '<div class="grid-item"><i style="font-size: 120px;color:white;" class="icon-joker_graficas" aria-hidden="true"></i><br><h4>Reportes</h4></div>'],
                    ['options' => ['class' => 'sortable_color_4'], 'content' => '<div onclick="location.href=\'documentos/\'" class="grid-item"><i style="font-size: 120px;color:white;" class="icon-joker_Archivar" aria-hidden="true"></i><br><h4>Documentos</h4></div>'],
                ]
            ]);
            ?>

          
            
        </div>
    </div>
</div>
</div>

