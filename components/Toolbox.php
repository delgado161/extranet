<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Toolbox extends Component {

    public function init() {
        parent::init();

    }

    public function flipSwitch($id,$status,$name='onoffswitch') {
        return ' <div class = "onoffswitch">
        <input type = "checkbox" name = "'.$name.'" class = "onoffswitch-checkbox" id = "'.$id.'" '.$status.'>
        <label class = "onoffswitch-label" for = "'.$id.'">
        <span class = "onoffswitch-inner"></span>
        <span class = "onoffswitch-switch"></span>
        </label>
        </div>';

    }

}
?>