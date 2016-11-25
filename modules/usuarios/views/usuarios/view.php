<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\jui\Accordion;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */

$this->title = $model->flPersona->nombre . " " . $model->flPersona->s_nombre . " " . $model->flPersona->apellido . " " . $model->flPersona->s_apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view panel_up">

    <div class="panel panel-default" style="overflow: auto;">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?php // Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>

        </div>

        <br>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;" >
             <?php
                if ($model->flPersona->foto != 'ND.jpg' && !empty($model->flPersona->foto ) )
                   echo Html::img(Url::to(['/'], true) . 'uploads/personas/image/thumb_' . Yii::$app->user->identity->id . ".jpg");
                else
                   echo Html::img(Url::to(['/'], true) . 'uploads/personas/image/ND.jpg');
                ?>
            
            <br>   <br>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_clave" aria-hidden="true"></i>'), ['update', 'id' => $model->id_usuario], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => '', 'style' => 'font-size: 30px; margin-top: 6px;color: red;']) ?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
            <div class="div_list" >
                <div class="titulo_list" > Usuario </div><?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['update', 'id' => $model->id_usuario], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-right:10px;font-size: 25px; margin-top: 6px;color: white;']) ?>    
            </div>
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Alias',
                        'value' => $model->username,
                    ],
                    [
                        'label' => 'Perfil',
                        'value' => $model->flPerfil->nombre,
                    ],
                    'ultimo_login',
                    [
                        'label' => 'Estatus',
                        'value' => ($model->status == 1) ? Activo : Inactivo,
                    ],
                ],
            ])
            ?>


            <div class="div_list" style="">
                <div class="titulo_list" style=""> Persona </div><?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['/usuarios/personas/update', 'id' => $model->id_usuario], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-right:10px;font-size: 25px; margin-top: 6px;color: white;']) ?>    
            </div>


            <?=
            DetailView::widget([
                'model' => $model->flPersona,
                'attributes' => [
                    [
                        'label' => 'N° Documento',
                        'value' => $model->flPersona->fkDocumento->nombre . "-" . $model->flPersona->n_documento,
                    ],
                    [
                        'label' => 'Nombre completo',
                        'value' => $model->flPersona->nombre . " " . $model->flPersona->s_nombre . " " . $model->flPersona->apellido . " " . $model->flPersona->s_apellido
                    ],
                    [
                        'label' => 'Genero',
                        'value' => ($model->flPersona->genero == 'M') ? 'Masculino' : 'Femenino'
                    ],
                    [
                        'label' => 'Cargo',
                        'value' => $model->flPersona->fkCargo->cargo
                    ],
                    'email_personal:email',
                    'email_corporativo:email',
                    'telefono',
                    'telefono_2',
                    'celular',
                    'fax',
                    [
                        'label' => 'Fecha de Nacimiento',
                        'value' => date_format(date_create($model->flPersona->fl_nacimiento), 'd-m-Y'),
                    ],
                    'observaciones:ntext',
                    [
                        'label' => 'Estatus',
                        'format' => 'raw',
                        'value' => Yii::$app->Toolbox->flipSwitch($model->flPersona->id_persona, ($model->flPersona->status == 0 ? '' : 'checked'), null, Url::to(['/usuarios/personas/udpswitch', 'id' => $model->flPersona->id_persona], true)),
                    ],
                ],
            ])
            ?>

        </div>


        <!--</div>-->

    </div>
</div>

<style>
    #w0 th,#w1 th{ width: 150px;}
</style>


