<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */

$this->title = $model->flPersona->nombre . " " . $model->flPersona->s_nombre . " " . $model->flPersona->apellido . " " . $model->flPersona->s_apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view panel_up">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_documento" aria-hidden="true"></i>'), ['update', 'id' => $model->id_usuario], ['data-toggle' => "tooltip", 'title' => "Hooray!", 'class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #FEA63C;']) ?>    

        </div>
        <div class="panel-body">


            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Perfil',
                        'value' => $model->flPerfil->nombre,
                    ],
                    'ultimo_login',
                    'status',
                ],
            ])
            ?>


            <?=
            DetailView::widget([
                'model' => $model->flPersona,
                'attributes' => [
                    'fk_cargo',
                    'fk_documento',
                    'n_documento',
                    'email_personal:email',
                    'email_corporativo:email',
                    'telefono',
                    'telefono_2',
                    'celular',
                    'fax',
                    'foto',
                    'fl_nacimiento',
                    'genero',
                    'observaciones:ntext',
                    'status',
                ],
            ])
            ?>


        </div>
    </div>
</div>
