<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/new_site.css',
        'css/tablas.css',
        'css/FlipSwitch.css',
        'css/tab.css',
        'css/menu_vertical.css',
        'css/font-awesome/css/font-awesome.css',
        'css/font-awesome/css/font-awesome.min.css',
        'css/style_yoker.css',
        'css/panel.css',
        'css/modal.css',
        'css/sorteable.css'
        
    ];
    public $js = [
        'js/comun.js',
        'js/google_maps.js',
        'js/flipSwitch.js',
        'js/fullscreen/jquery.fullscreen.js'        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
