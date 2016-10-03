<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Personas */

$this->title = $model->id_persona;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_persona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_persona',
            'fk_cargo',
            'fk_documento',
            'n_documento',
            'nombre',
            's_nombre',
            'apellido',
            's_apellido',
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
    ]) ?>

</div>
