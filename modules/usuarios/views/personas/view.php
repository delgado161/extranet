<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Personas */

$this->title = $model->nombre . " " . $model->s_nombre . " " . $model->apellido . " " . $model->s_apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="usuarios-view panel_up">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?php // echo  Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:red']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_editar" aria-hidden="true"></i>'), ['update', 'id' => $model->id_persona], ['class' => 'btn_crear', 'style' => 'margin-left:10px;font-size: 23px; margin-top: 4px;color: #EC971F;']) ?>    

        </div>
        <div class="panel-body">
            <?=
            DetailView::widget([
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
            ])
            ?>

        </div>
    </div>
</div>


<?php if (Yii::$app->session->get('modal')) { ?>
  
    <script>parent.actualizar_select('<?= $model->id_persona ?>', '<?= $this->title ?>')</script>
<?php } ?>