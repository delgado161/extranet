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

//        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
//            Yii::$app->response->format='json';
//            return ActiveForm::validate($model);
//        }
        $model->status = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'title' => 'Creado Correctamente',
                'icon' => 'glyphicon glyphicon-ok-sign',
                'body' => 'Usuario' . $model->username,
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
            return $this->render('create', [
                        'model' => $model,
            ]);
        }

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

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);

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
