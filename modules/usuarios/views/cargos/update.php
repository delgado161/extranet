<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Cargos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cargos',
]) . $model->id_cargo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cargos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cargo, 'url' => ['view', 'id' => $model->id_cargo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cargos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
