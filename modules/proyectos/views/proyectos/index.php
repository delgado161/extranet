<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\proyectos\models\ProyectosSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyectos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Proyectos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_proyectos',
            'fk_cliente',
            'fk_tipo',
            'fk_lider',
            'fk_status',
            // 'fk_contacto',
            // 'fk_contact_alterno',
            // 'nombre',
            // 'descripcion:ntext',
            // 'Keywords:ntext',
            // 'fl_inicio',
            // 'fl_fin',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
