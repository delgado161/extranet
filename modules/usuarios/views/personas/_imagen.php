<?php

use bupy7\cropbox\Cropbox;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  

    <?php
    echo $form->field($model, 'foto')->widget(Cropbox::className(), [
        'attributeCropInfo' => 'crop_info',
//        'previewUrl' => [
//            'uploads/personas/image/thumb_928.jpg'
//        ],
        'optionsCropbox' => [
            'boxWidth' => 320,
            'boxHeight' => 320,
            'cropSettings' => [
                [
                    'width' => 200,
                    'height' => 200,
                ],
            ],
        ]


//        'originalUrl' => 'uploads/personas/image/928.jpg',
    ]);
    ?>
</div>