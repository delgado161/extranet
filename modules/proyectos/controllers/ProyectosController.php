<?php

namespace app\modules\proyectos\controllers;

use Yii;
use app\modules\proyectos\models\Proyectos;
use app\modules\proyectos\models\ProyectosSEARCH;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProyectosController implements the CRUD actions for Proyectos model.
 */
class ProyectosController extends Controller {

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
     * Lists all Proyectos models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProyectosSEARCH();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Proyectos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Proyectos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Proyectos();

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->fk_status = 1;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_proyectos]);
            } else {
                return $this->render('create', ['model' => $model,]);
            }
        } else {
            return $this->render('create', ['model' => $model,]);
        }

    }

    /**
     * Updates an existing Proyectos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_proyectos]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Proyectos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    }

    /**
     * Finds the Proyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Proyectos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    public function actionDocumentos() {


        $model = new Proyectos();

        if (Yii::$app->request->isPost) {
            $model->imageFile = \yii\web\UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
//                  return $this->redirect(['documentos', 'model' => $model]);
//                return $this->render('documentos', ['model' => $model]);
                return '{}';
            }
        } else {
            return $this->render('documentos', ['model' => $model]);
        }

    }

   

}
