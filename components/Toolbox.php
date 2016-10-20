<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\modules\configuraciones\models\Municipios;
use app\modules\configuraciones\models\Estados;
use app\modules\configuraciones\models\Paises;
use app\modules\configuraciones\models\Parroquias;
use kartik\widgets\Growl;

class Toolbox extends Component {

    public function init() {
        parent::init();

    }

    public function flipSwitch($id, $status, $name = 'onoffswitch', $url = null) {
        return ' <div class = "onoffswitch">
        <input type = "hidden"  class = "src_flip" id="' . $url . '" >
        <input type = "checkbox" name = "' . $name . '" class = "onoffswitch-checkbox" id = "' . $id . '" ' . $status . '>
        <label class = "onoffswitch-label" for = "' . $id . '">
        <span class = "onoffswitch-inner"></span>
        <span class = "onoffswitch-switch"></span>
        </label>
        </div>';

    }

    public function buscar_PME($id_municipio) {

        $parroquia = Parroquias::find()->where(['lp_parroquia_id' => $id_municipio])->one();
        $municipio = Municipios::find()->where(['lp_municipio_id' => $parroquia->lf_parroquia_municipio])->one();
        $estado = Estados::find()->where(['lp_estado_id' => $municipio->lf_municipio_estado])->one();
        $pais = Paises::find()->where(['lp_pais_id' => $estado->lf_estado_pais])->one();
        return [$pais, $estado, $municipio];

    }

    public function verificar_modal($parametros = array()) {
        if (isset($_GET['modal']) || Yii::$app->session->get('modal')) {
            Yii::$app->session->set('modal', true);
            $parametros['modal'] = 1;
        }

        return $parametros;

    }

    public function MSJ_SUCCESS($title = null, $body = null,$pos=array()) {

        Yii::$app->getSession()->setFlash('success', [
            'type' => Growl::TYPE_SUCCESS,
            'title' => $title,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => $body,
            'delay' => 5000, 'pluginOptions' => ['placement' => ['from' => $pos[0], 'align' =>  $pos[1],]]]);

    }

}

?>