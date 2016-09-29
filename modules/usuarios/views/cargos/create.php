<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Cargos */

$this->title = Yii::t('app', 'Create Cargos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cargos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
