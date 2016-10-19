<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Clientes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Clientes',
]) . $model->id_cliente;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente, 'url' => ['view', 'id' => $model->id_cliente]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
