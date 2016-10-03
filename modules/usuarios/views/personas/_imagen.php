<?php

use bupy7\cropbox\Cropbox;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  

    <?php
    echo $form->field($model, 'foto')->widget(Cropbox::className(), [
        'attributeCropInfo' => 'crop_info',
<<<<<<< HEAD
        'previewUrl' => [
            'uploads/personas/image/thumb_928.jpg'
        ],
        'originalUrl' => 'uploads/personas/image/928.jpg',
=======
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
>>>>>>> 58c9ece86cc2bd8785259f292f74254b85ede0fe
    ]);
    ?>
</div>