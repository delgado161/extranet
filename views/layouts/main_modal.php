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


        <div class="wrap">
            <?php echo $this->render('_header', []) ?>
            <?php echo $this->render('_vertical_menu', []) ?>

            <div class="contenido">
                <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                    <?php
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



            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>


