<?php

use bupy7\cropbox\Cropbox;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  

    <?php
    echo $form->field($model, 'foto')->widget(Cropbox::className(), [
        'attributeCropInfo' => 'crop_info',
        'previewUrl' => [
            'uploads/personas/image/thumb_928.jpg'
        ],
        'originalUrl' => 'uploads/personas/image/928.jpg',
    ]);
    ?>
</div>