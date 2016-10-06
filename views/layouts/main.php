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



        <?php $this->beginBody() ?>
        <?php
//            NavBar::begin([
//                'brandLabel' => Html::img('@web/img/aw.png', ['alt' => Yii::$app->name]),
//                'brandUrl' => Yii::$app->homeUrl,
//                'options' => [
//                    'class' => '',
//                ],
//            ]);
//            echo Nav::widget([
//                'options' => ['class' => 'navbar-nav navbar-right'],
//                'items' => [
//                    ['label' => 'Home', 'url' => ['/site/index']],
//                    ['label' => 'About', 'url' => ['/site/about']],
//                    ['label' => 'Contact', 'url' => ['/site/contact']],
//                    Yii::$app->user->isGuest ? (
//                            ['label' => 'Login', 'url' => ['/site/login']]
//                            ) : (
//                            '<li>'
//                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
//                            . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
//                            )
//                            . Html::endForm()
//                            . '</li>'
//                            )
//                ],
//            ]);
//           NavBar::end();
        ?>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="wrap">
                <?php echo $this->render('_header', []) ?>
                <?php echo $this->render('_vertical_menu', []) ?>

                <div class="contenido">
                    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                        <?php
                        
//                          echo Growl::widget([
//            'type' => Growl::TYPE_SUCCESS,
//            'title' => 'Well done!',
//            'icon' => 'glyphicon glyphicon-ok-sign',
//            'body' => 'You successfully read this important alert message.',
//            'showSeparator' => true,
//            'delay' => 0,
//            'pluginOptions' => [
//                'showProgressbar' => true,
//                'placement' => [
//                    'from' => 'top',
//                    'align' => 'right',
//                ]
//            ]
//        ]);
                        
                        echo \kartik\widgets\Growl::widget([
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
                <div class="wrap" style="   background: url('img/fondo_1.jpg') ; ">
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
            ;
            ?>

            <?php
            if (Yii::$app->session['full'] == "1" && isset(Yii::$app->session['full'])) {
//               echo "<script>fullwindows()</script>";
//                $this->registerJS("$(document).ready(function () { $('.btn_maximizar').trigger('click')});");
            } else {
//                $this->registerJS("exit_fullwindows()");
            }
            ?>
            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
