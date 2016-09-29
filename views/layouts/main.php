<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
