<?php use yii\helpers\Url;?>
<div class="nav_varD">
    <div class="nav_logo">
        <img src="<?php echo Url::to(['/'], true) ?>/img/IDS.png" alt="Smiley face" style="width: 100%;    margin-top: 10px;">
    </div>

    <div style=" background: red;" class="nav_derecho">
        <div class="nav_level1">
            <div class="nav_level1_left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                </div> 
            </div>
            <div class="btn_menu_h">
                <i class="glyphicon glyphicon-th" aria-hidden="true"></i>
            </div>
            <div class="info_user">
                <?php
                echo Yii::$app->user->identity->flPersona->nombre . " " . Yii::$app->user->identity->flPersona->s_nombre . " " .
                Yii::$app->user->identity->flPersona->apellido . " " . Yii::$app->user->identity->flPersona->s_apellido;
                ?>

            </div>

            <div class="_img"><img src="<?php echo Url::to(['/'], true) ?>/uploads/personas/image/thumb_<?php echo Yii::$app->user->identity->id; ?>.jpg" alt="" class="img"></div>
            <div class="menu_login">

                <div><i class="fa fa-user" aria-hidden="true"></i> Mi Perfil</div>
                <div><i class="fa fa-sign-in" aria-hidden="true"></i> Cerrar Sessión</div>


            </div>
        </div>

        <div class="nav_level2">
            <?php

            use yii\widgets\Breadcrumbs;

echo Breadcrumbs::widget([
                'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
            ?>

            <!--<div class="sp_home" ><i class="fa fa-home fa-2x" aria-hidden="true"></i> </div>-->
            <?php //  var_dump($this->params['breadcrumbs']) ?>
<!--            <div class="sp_semilla" ><i class="fa fa-angle-right" aria-hidden="true"></i> CONTENIDO </div>
            <div class="sp_calendar" >&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></div>
            <div class="sp_clock" >&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></div>-->
        </div>
    </div>

</div>