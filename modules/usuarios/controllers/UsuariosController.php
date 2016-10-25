<?php

namespace app\modules\usuarios\controllers;

use Yii;
use app\modules\usuarios\models\Usuarios;
use app\modules\usuarios\models\UsuariosSEARCH;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use kartik\widgets\Growl;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'udpswitch' => ['POST'],
                ],
            ],
        ];

    }

    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsuariosSEARCH();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Usuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Usuarios();
        $model->setScenario('create');

        $model->status = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->Toolbox->MSJ_SUCCESS('Creado Correctamente', 'Usuario' . $model->username,['bottom','right']);
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else
            return $this->render('create', ['model' => $model,]);

    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->validate_clave = $model->clave;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'title' => 'Modificado Correctamente',
                'icon' => 'glyphicon glyphicon-ok-sign',
                'body' => 'Usuario: ' . $model->username,
                'delay' => 5000,
                'pluginOptions' => [
                    'placement' => [
                        'from' => 'bottom',
                        'align' => 'right',
                    ]
                ]
            ]);
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else {
            return $this->render('update', ['model' => $model,]);
        }

    }

    public function actionStatus($id) {
        $model = $this->findModel($id);
        $model->validate_clave = $model->clave;
        if ($model->save()) {
            Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'title' => 'Modificado Correctamente',
                'icon' => 'glyphicon glyphicon-ok-sign',
                'body' => 'Usuario: ' . $model->username,
                'delay' => 5000,
                'pluginOptions' => [
                    'placement' => [
                        'from' => 'bottom',
                        'align' => 'right',
                    ]
                ]
            ]);
        }

    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id) {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//
//    }

    public function actionUdpswitch($id) {
        $model = $this->findModel($id);
        $model->status = ($model->status == 0) ? 1 : 0;
        $model->save();
        return;

    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

}
