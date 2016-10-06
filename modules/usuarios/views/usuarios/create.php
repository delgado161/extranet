<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */

$this->title = Yii::t('app', 'Create Usuarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-create" style="margin-top: 90px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-iconos_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-iconos_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', ['model' => $model,]) ?>
        </div>
    </div>
</div>
