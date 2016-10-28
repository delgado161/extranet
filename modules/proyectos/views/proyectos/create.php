<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\proyectos\models\Proyectos */

$this->title = Yii::t('app', 'Create Proyectos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="proyectos-create panel_up"  >

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_minimizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear', 'style' => 'margin-left:10px;color:white;font-size:22px;    margin-top: 4px;']) ?>
            <?= Html::a(Yii::t('app', '<i class="icon-joker_maximizar" aria-hidden="true"></i>'), null, ['class' => 'btn_crear btn_maximizar', 'style' => 'margin-left:40px;color:white;font-size:22px;    margin-top: 4px;']) ?>

        </div>
        <div class="panel-body">
            <?php
            $form = ActiveForm::begin([
                        'options' => [ 'id' => $model->tableName() . "_form",
                            'class' => 'tab_validate',
                        ],
            ]);
            ?>

            <div class="col-md-12 bhoechie-tab-container bhoechie-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                    <div class="list-group">
                        <div class="list-group-item text-center tab_new" onclick="$('#submit_personas').hide();">
                            <i style="font-size: 30px;" class="icon-joker_graficas2" aria-hidden="true"></i><br/>Proyecto
                        </div>
                        <div class="list-group-item text-center tab_new" onclick="$('#submit_personas').show();">
                            <i style="font-size: 30px;" class="icon-joker__libreta-22" aria-hidden="true"></i><br/>Contactos
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                    <div class="bhoechie-tab-content active">
                        <?= $this->render('_form', ['model' => $model, 'form' => $form]) ?>
                    </div>

                    <div class="bhoechie-tab-content" >
                        <?= $this->render('_contactos', ['model' => $model, 'form' => $form]) ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn_accione" >
                <div class="form-group">
                    <br>
                    <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['style' => 'display:none;', 'id' => 'submit_btn', 'class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-ban" aria-hidden="true"></i>', ['/controller/action'], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>


