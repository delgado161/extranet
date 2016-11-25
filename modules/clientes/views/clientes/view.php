<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Clientes */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="clientes-view panel_up">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_editar" aria-hidden="true"></i>'), ['update', 'id' => $model->id_persona], ['class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #EC971F;']) ?>    

        </div>
        <div class="panel-body">
            <div class="div_list" style="">
                <div class="titulo_list" style=""> Cliente </div><?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['/clientes/clientes/update', 'id' => $model->id_cliente], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-right:10px;font-size: 25px; margin-top: 6px;color: white;']) ?>    
            </div>

            <?php
            list($pais, $estado, $municipio, $parroquia) = Yii::$app->Toolbox->buscar_PME($model_direcciones->lf_direccion_parroquia);

            $direccion_completa = $pais->nombre . ", ESTADO " . $estado->nombre . " MUNICIPIO " . $municipio->nombre . " PARROQUIA " . $parroquia->nombre . ", ";
            $direccion_completa.=(!empty($model_direcciones->urbarn_barrio)) ? $model_direcciones->t_urban_barr . " " . $model_direcciones->urbarn_barrio . ", " : '';
            $direccion_completa.=(!empty($model_direcciones->calle_av)) ? $model_direcciones->t_calle_av . " " . $model_direcciones->calle_av . ", " : '';
            $direccion_completa.=$model_direcciones->tipovivienda . " " . $model_direcciones->datovivienda . " ";
            $direccion_completa.="<br><br> CODIGO POSTAL" . $model_direcciones->codpostal;

            $direccion_completa.= "<br><br>PUNTO DE REFERENCIA<br>" . $model_direcciones->lfDireccionPtoreferencia->nombre . " " . $model_direcciones->referencia;
            $direccion_completa.='<div style="float: right;color:deeppink;" data-toggle = "modal"  data-target = "#myModal" onclick = src_frame(\'' . Url::to(['/site/map?modal=1&lat=' . $model_direcciones->lat . "&lgn=" . $model_direcciones->lng], true) . '\',\'\')>Ver <i class="fa icon-joker_dirreción fa-3x" aria-hidden="true"></i></div>';
            ?>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'N° Documento',
                        'value' => $model->fkDocumento->nombre . "-" . strtoupper($model->rif),
                    ],
                    [
                        'label' => 'Tipo de Cliente',
                        'format' => 'raw',
                        'value' => $model->t_empresa,
                    ],
                    'nombre',
                    'nombre_corto',
                    'email',
                    'telefono_1',
                    'telefono_2',
                    'fax',
                    [
                        'label' => 'Dirección',
                        'format' => 'raw',
                        'value' => $direccion_completa,
                    ],
                    [
                        'label' => 'Estatus',
                        'format' => 'raw',
                        'value' => Yii::$app->Toolbox->flipSwitch($model->id_cliente, ($model->status == 0 ? '' : 'checked'), null, Url::to(['/usuarios/personas/udpswitch', 'id' => $model->id_cliente], true)),
                    ],
                ],
            ])
            ?>
            <br>

            <?php
            echo kartik\file\Sortable::widget([
                'type' => 'grid',
                'items' => [
                    ['content' => '<div class="grid-item text-danger">Item 1</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 2</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 3</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 4</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 5</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 6</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 7</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 8</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 9</div>'],
                    ['content' => '<div class="grid-item text-danger">Item 10</div>'],
                ]
            ]);
            ?>

        </div>
    </div>
</div>
</div>
