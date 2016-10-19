<?php

use bupy7\cropbox\Cropbox;
use yii\helpers\Url;

$confi_Cropbox = ['attributeCropInfo' => 'crop_info',
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
];

$ext_ = explode(".", $model->foto);

if (!empty($model->id_persona) && !empty($model->foto)) {
    $confi_Cropbox['previewUrl'] = Url::to(['/'], true) . '/uploads/personas/image/thumb_' . $model->id_persona . '.' . $ext_[1];
    $confi_Cropbox['originalUrl'] = Url::to(['/'], true) . '/uploads/personas/image/' . $model->foto;
}
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  

    <?php
    echo $form->field($model, 'foto')->widget(Cropbox::className(), $confi_Cropbox);

//        'originalUrl' => 'uploads/personas/image/928.jpg',
    ?>
</div>