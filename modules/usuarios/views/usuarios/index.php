<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\usuarios\models\Perfiles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\usuarios\models\UsuariosSEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">
    <p>
        <?= Html::a(Yii::t('app', '<i class="fa fa-filter" aria-hidden="true"></i>'), null, ['class' => 'btn btn-primary btn_crear btn_filter']) ?>
        <?php echo Html::a(Yii::t('app', '<i class="fa fa-plus" aria-hidden="true"></i> Create Usuarios'), ['create'], ['class' => 'btn btn-success btn_crear']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <?php Pjax::begin(['id' => 'pbegin_'.$searchModel->tableName(),
//        'timeout' => false,
        'enablePushState' => false,]); ?>   
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'nombre_perfil',
                'value' => 'flPerfil.nombre',
                'filter' => Html::activeDropDownList($searchModel, 'nombre_perfil', ArrayHelper::map(Perfiles::find()->asArray()->all(), 'id_perfile', 'nombre'), ['class' => 'form-control', 'prompt' => 'Seleccione...']),
            ],
            [
                'attribute' => 'nombre_persona',
                'value' => function($dataProvider) {
                    return $dataProvider->flPersona->nombre . " " . $dataProvider->flPersona->s_nombre;
                }
            ],
            [
                'attribute' => 'apellido_persona',
                'value' => function($dataProvider) {
                    return $dataProvider->flPersona->apellido . " " . $dataProvider->flPersona->s_apellido;
                }
            ],
//            ['class' => 'yii\grid\SerialColumn'],
//            'id_usuario',
//            'fl_perfil',
//            'fl_persona',
            'username',
//            'clave',
        // 'ultimo_login',
        // 'status',
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>
