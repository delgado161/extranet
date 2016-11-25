<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;
use xj\rsa\RsaPrivate;
use xj\rsa\RsaPublic;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                    'logout' => ['post', 'get'],
                ],
            ],
        ];

    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];

    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        if (isset($_POST['full'])) {
            Yii::$app->session['full'] = $_POST['full'];
        }

//        echo Yii::$app->session['full'];
//        exit();

        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            $this->redirect(\Yii::$app->urlManager->createUrl("site/login"));
        }



//        $this->redirect(\Yii::$app->urlManager->createUrl("site/login"));

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', ['model' => $model]);

    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();

    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);

    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');

    }

    public function actionMap($lat, $lgn) {
        return $this->render('_mapa', ['lat' => $lat, 'lgn' => $lgn]);

    }

    public function actionSendxml() {
        // Aplico toda la logica de Parseo XML
        // Vamos a validar el Archivo XML

        $xmlFileBase64 = base64_encode('<?xml version="1.0" encoding="UTF-8" ?><data><info><RIF>J-312171197</RIF>
        <serialImobile>D880396E3692</serialImobile>
        <verHardwareImobile>TFHK-IAD-VE02 rev.00.2</verHardwareImobile>
        <verFirmwareImobile>01.00.00</verFirmwareImobile>
        <serialMaquina>Z6B8888000</serialMaquina>
        <verFirmwareMaquina>01.00.00</verFirmwareMaquina>
        <op>1</op>
        </info>
        <file>
        <numz>16</numz>
        <datez>161025</datez>
        <timez>936</timez>
        <nlastinv>38</nlastinv>
        <datelastinv>161025</datelastinv>
        <timelastinv>936</timelastinv>
        <nlastnd>1</nlastnd>
        <nlastnc>1</nlastnc>
        <nlastdnf>4</nlastdnf>
        <tex>65.45</tex>
        <tbia>32.74</tbia>
        <tivaa>7.20</tivaa>
        </file>
        <sign>
        MWWbXD3iNzL6OoCqPPKYhfxcq1gs+t7QgHa4J3Vp7BIpSPkeAeDCID1egloNpjwmW++xQqCkGwBooSoe0LEfnNQ0bpxyvne35LqxH4PknaWjP6lgnp0peZhUS+Cmal0e6RdLnzEZ8bVATAH7iUXNBaMs2vE7IVkzsJWLBred4+6sn1KGRpHzoMPkPP0gvzfMptUKWy9f5NAU14SJZieTKRgZ41koPur5h/FxcKWLU7HrTU6ffdqQwn8KpClucxz7ZFkPWuiYL6svrejTnkF4LJaE6wxhDUahTIKt5FhsAgsZBbwue9LRMUg2Kg1/f774jASozEqh2b0En5omdIjhVA==
        </sign>
        </data>');



//        $xmlFile = base64_decode($xmlFileBase64);
//        echo $xmlFile;
//        echo '<br>';
//         $xml_parse = Yii::$app->xmlparse->parseXmlString($xmlFile);
//        echo $xml_parse;
//         exit();
        //Validamos la firma
        $isValidSign = $this->isValidSign($xmlFileBase64);
        if ($isValidSign) {
            $xml_parse = Yii::$app->xmlparse->parseXmlString($xmlFile);
            if (!empty($xml_parse->info->op)) {
                $operacion = (String) $xml_parse->info->op;
                $result = $this->realizarOperacion($operacion, $xml_parse, $xmlFile);
                print_r([
                    'code' => !is_array($result) ? $result : $result['code'],
                    'params' => !is_array($result) ? [] : $result['params']
                ]);
                //return is_array($result) ? ['code' => $result['code'],'params'=>$result['params']] : ['code'=>$result];
            } else {
                return ['code' => '01004119']; // Operacion invalida
            }
        } else {
            // Firma invalida
            return ['code' => '01004116']; // Error en la firma, llave no autorizada
        }

    }

    public function isValidSign($xmlFileBase64) {
        $xmlFile = base64_decode($xmlFileBase64);

        $xml_parse = @simplexml_load_string($xmlFile);



//        $xml_parse = Yii::$app->xmlparse->parseXmlString($xmlFile);

        $valores_ = "";
        foreach ($xml_parse->info as $element) {
            $valores_ .="<info>";
            foreach ($element as $key => $val) {
                $valores_ .= "<" . $key . ">" . $val . "</" . $key . ">";
            }
            $valores_ .="</info>";
        }


        foreach ($xml_parse->file as $element) {
            $valores_ .="<file>";
            foreach ($element as $key => $val) {
                $valores_ .= "<" . $key . ">" . $val . "</" . $key . ">";
            }
            $valores_ .="</file>";
        }




//init
$privateKey = '@app/config/key-private.php';
$publicKey = '@app/config/key-public.php';
$str = 'yii2-rsa';

//private encrypt -> public decrypt
$privateEncryptString = RsaPrivate::model($privateKey)->encrypt($str);
$publicDecryptString = RsaPublic::model($publicKey)->decrypt($privateEncryptString);
var_dump('private', $str, $privateEncryptString, $publicDecryptString);

//public encrypt -> private decrypt
$publicEncryptString = RsaPublic::model($publicKey)->encrypt($str);
$privateDecryptString = RsaPrivate::model($privateKey)->decrypt($publicEncryptString);
var_dump('public', $str, $publicEncryptString, $privateDecryptString);
        exit();

        return true;

    }

}
