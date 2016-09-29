<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal',],
                'fieldConfig' => [
                    'template' => "{label}\n<div style=\"    margin-top: -2px; margin-right:2px;   \" class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
    ]);
    ?>
    <div class="input-group">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'autocomplete'=>'off']) ?>
        <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-user" aria-hidden="true"></i></button>
        </span>
    </div>


    <div class="input-group">
        <?= $form->field($model, 'password')->passwordInput((['autocomplete'=>'off'])) ?>

        <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-key" aria-hidden="true"></i></button>
        </span>
    </div>
    <?= $form->field($model, 'rememberMe')->checkbox([
    'template' => "<div class=\"col-lg-offset-1 col-lg-3\" style=\"display:none;\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>
    
        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Login <i class="fa fa-sign-in" aria-hidden="true"></i>', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    
    <?php ActiveForm::end(); ?>
</div>

</div><!-- /input-group -->