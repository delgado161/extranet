<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\Proyectos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Proyectos',
]) . $model->id_proyectos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proyectos, 'url' => ['view', 'id' => $model->id_proyectos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="proyectos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
