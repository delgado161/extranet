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

        if (empty($id_municipio)) {
            $parroquia = new Parroquias();
            $municipio = new Municipios();
            $estado = new Estados();
            $pais = new Paises();
        } else {
            $parroquia = Parroquias::find()->where(['lp_parroquia_id' => $id_municipio])->one();
            $municipio = Municipios::find()->where(['lp_municipio_id' => $parroquia->lf_parroquia_municipio])->one();
            $estado = Estados::find()->where(['lp_estado_id' => $municipio->lf_municipio_estado])->one();
            $pais = Paises::find()->where(['lp_pais_id' => $estado->lf_estado_pais])->one();
        }
        return [$pais, $estado, $municipio, $parroquia];

    }

    public function verificar_modal($parametros = array()) {
        if (isset($_GET['modal']) || Yii::$app->session->get('modal')) {
            Yii::$app->session->set('modal', true);
            $parametros['modal'] = 1;
        }

        return $parametros;

    }

    public function MSJ_SUCCESS($title = null, $body = null, $pos = array()) {

        if (isset($_GET['modal']) || Yii::$app->session->get('modal')) {
            $pos[0] = 'top';
            $pos[1] = 'center';
        }


        Yii::$app->getSession()->setFlash('success', [
            'type' => Growl::TYPE_SUCCESS,
            'title' => $title,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => $body,
            'delay' => 5000, 'pluginOptions' => ['placement' => ['from' => $pos[0], 'align' => $pos[1],]]]);

    }

    public function Parametros_password() {
        return [
            'pluginOptions' => [
                'showMeter' => true,
                'toggleMask' => false,
                'language' => 'es',
                'verdictTitles' => [
                    0 => 'Ninguna',
                    1 => 'Muy pobre',
                    2 => 'Pobre',
                    3 => 'Justo',
                    4 => 'Buena',
                    5 => 'Excelente',
                ],
                'verdictClasses' => [
                    0 => 'text-muted',
                    1 => 'text-danger',
                    2 => 'text-warning',
                    3 => 'text-info',
                    4 => 'text-primary',
                    5 => 'text-success'
                ],
            ]
                ]


        ;

    }

    public function randomText($length, $tabla, $campo_primario) {


        for ($i = 0; $i < 1; $i++) {
            $KEY = $this->generadorkey($length);
            $rows = (new \yii\db\Query())
                    ->select('*')
                    ->from($tabla)
                    ->where([$campo_primario => $KEY])
                    ->all();

            if (!$rows)
                return $KEY;
        }

    }

    public function generadorkey($length) {
        $pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{rand(0, 40)};
        }

        return $key;

    }

}

?>