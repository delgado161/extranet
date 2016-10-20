<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\Session;
use \kartik\widgets\Growl;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGFvxoh7UVAHGmSLTeXs-J9uWGUy2Tutc"></script>
        <!--        <link rel="stylesheet" href="https://use.fontawesome.com/c92e0cec2a.css">-->
        <?php $this->head() ?>
    </head>
    <body>
        <?php
        Yii::$app->session->remove('modal');

        if (isset($_GET['modal']) || Yii::$app->session->get('modal'))
            Yii::$app->session->set('modal', true);
        
        
        ?>
        <?php $this->beginBody()
        ?>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="wrap">
                <?php if (!Yii::$app->session->get('modal')) { ?>
                    <?php echo $this->render('_header', []) ?>
                    <?php echo $this->render('_vertical_menu', []) ?>
                    <div class="contenido">
                    <?php } else { ?>
                        <style>
                            .panel_up{
                                margin-top: 0px !important;
                            }
                        </style>
                        <div class="contenido" style="margin-left: 0px !important;">
                        <?php } ?>
                        <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                            <?php
                            echo Growl::widget([
                                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                                'title' => (!empty($message['title'])) ? Html::encode($message['title']) : '',
                                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                                'body' => (!empty($message['body'])) ? Html::encode($message['body']) : '',
                                'showSeparator' => true,
                                'delay' => 1, //This delay is how long before the message shows
                                'pluginOptions' => [
                                    'showProgressbar' => true,
                                    'delay' => (!empty($message['delay'])) ? $message['delay'] : 3000, //This delay is how long the message shows for
                                    'placement' => [
                                        'from' => (!empty($message['pluginOptions']['placement']['from'])) ? $message['pluginOptions']['placement']['from'] : 'top',
                                        'align' => (!empty($message['pluginOptions']['placement']['align'])) ? $message['pluginOptions']['placement']['align'] : 'right',
                                    ]
                                ]
                            ]);
                            ?>
                        <?php endforeach; ?>
                        <?php echo $content; ?>

                    </div>
                <?php } else {
                    ?>
                    <div class="wrap" style="   background: url('../img/fondo_1.jpg') ; ">
                        <div class = "container">
                            <div class = "row">
                                <div class = "col-lg-12">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


                <?php
                if (Yii::$app->session['full'] == "1" && isset(Yii::$app->session['full'])) {
//               echo "<script>fullwindows()</script>";
//                $this->registerJS("$(document).ready(function () { $('.btn_maximizar').trigger('click')});");
                } else {
//                $this->registerJS("exit_fullwindows()");
                }
                ?>

                <?php if (!Yii::$app->session->get('modal')) { ?>
                    <?php echo $this->render('_modal', []) ?>

                <?php } ?>
            </div>

            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
