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
            <?= Html::a(Yii::t('app', '<i class="icon-joker_edictar" aria-hidden="true"></i>'), ['update', 'id' => $model->id_usuario], ['class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #EC971F;']) ?>    
           


        </div>
        <div class="panel-body">


            <p>
                <?php // Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
                <?php
//                Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_usuario], [
//                    'class' => 'btn btn-danger',
//                    'data' => [
//                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                        'method' => 'post',
//                    ],
//                ])
                ?>
            </p>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id_usuario',
                    [
                        'label' => 'fl_perfil',
                        'value' => $model->flPerfil->nombre,
                    ],
//            'login',
//                    'clave',
                    'ultimo_login',
                    'status',
                ],
            ])
            ?>
        </div>
    </div>
</div>
