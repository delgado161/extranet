<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Personas */

$this->title = $model->nombre . " " . $model->s_nombre . " " . $model->apellido . " " . $model->s_apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="usuarios-view panel_up">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?php // echo Html::a(Yii::t('app', '<i class="icon-joker_editar" aria-hidden="true"></i>'), ['update', 'id' => $model->id_persona], ['class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #EC971F;']) ?>    

        </div>
        <div class="panel-body">
            <br>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;" >
                <?= Html::img(Url::to(['/'], true) . 'uploads/personas/image/thumb_' . Yii::$app->user->identity->id . ".jpg"); ?>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
                <div class="div_list" style="">
                    <div class="titulo_list" style=""> Persona </div><?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['/usuarios/personas/update', 'id' => $model->id_persona], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-right:10px;font-size: 25px; margin-top: 6px;color: white;']) ?>    
                </div>
                <?php list($pais, $estado, $municipio, $parroquia) = Yii::$app->Toolbox->buscar_PME($model_direcciones->lf_direccion_parroquia); ?>


                <?php
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
                            'value' => $model->fkDocumento->nombre . "-" . $model->n_documento,
                        ],
                        [
                            'label' => 'Nombre completo',
                            'value' => $model->nombre . " " . $model->s_nombre . " " . $model->apellido . " " . $model->s_apellido
                        ],
                        [
                            'label' => 'Genero',
                            'value' => ($model->genero == 'M') ? 'Masculino' : 'Femenino'
                        ],
                        [
                            'label' => 'Cargo',
                            'value' => $model->fkCargo->cargo
                        ],
                        'email_personal:email',
                        'email_corporativo:email',
                        'telefono',
                        'telefono_2',
                        'celular',
                        'fax',
                        [
                            'label' => 'Fecha de Nacimiento',
                            'value' => date_format(date_create($model->fl_nacimiento), 'd-m-Y'),
                        ],
                        'observaciones:ntext',
                        [
                            'label' => 'Dirección',
                            'format' => 'raw',
                            'value' => $direccion_completa,
                        ],
                        [
                            'label' => 'Estatus',
                            'format' => 'raw',
                            'value' => Yii::$app->Toolbox->flipSwitch($model->id_persona, ($model->status == 0 ? '' : 'checked'), null, Url::to(['/usuarios/personas/udpswitch', 'id' => $model->id_persona], true)),
                        ],
                    ],
                ])
                ?>



            </div>
        </div>
    </div>
</div>


<?php if (Yii::$app->session->get('modal')) { ?>

    <script>parent.actualizar_select('<?= $model->id_persona ?>', '<?= $this->title ?>')</script>
<?php } ?>

    