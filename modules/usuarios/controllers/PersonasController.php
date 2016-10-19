<?php

namespace app\modules\usuarios\controllers;

use Yii;
use app\modules\usuarios\models\Personas;
use app\modules\usuarios\models\PersonasSEARCH;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\usuarios\models\Direcciones;

/**
 * PersonasController implements the CRUD actions for Personas model.
 */
class PersonasController extends Controller {

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
     * Lists all Personas models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PersonasSEARCH();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Personas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Personas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Personas();
        $model_direcciones = new Direcciones();



        if ($model->load(Yii::$app->request->post()) && $model_direcciones->load(Yii::$app->request->post())) {
            $model->status = 0;
            $model->fl_nacimiento = date_format(date_create($model->fl_nacimiento), 'Y-m-d');
            $model->foto = \yii\web\UploadedFile::getInstance($model, 'foto');
            $model_direcciones->lat = floatval($model_direcciones->lat);
            $model_direcciones->lng = floatval($model_direcciones->lng);
            $model_direcciones->visibilidad = 1;


//            $model->crop_info = $_POST['Personas']['crop_info'];
//            var_dump($_POST);
//            var_dump($model->crop_info);
//            exit();
            if ($model->save()) {
                $model_direcciones->claveforeana = Yii::$app->db->getLastInsertID();
                $model_direcciones->tabla_referen = $model->tableName();
                $model->img_new();
                if ($model_direcciones->save())
                    return $this->redirect(['view', 'id' => $model->id_persona]);
                else
                    return $this->render('create', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
            } else {
                return $this->render('create', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
            }
        } else {
            return $this->render('create', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
        }

    }

    /**
     * Updates an existing Personas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->fl_nacimiento = date_format(date_create($model->fl_nacimiento), 'd-m-Y');




        if (Direcciones::find()->where(['claveforeana' => $model->id_persona, 'tabla_referen' => $model->tableName()])->one() !== null)
            $model_direcciones = Direcciones::find()->where(['claveforeana' => $model->id_persona, 'tabla_referen' => $model->tableName()])->one();
        else
            $model_direcciones = new Direcciones();

        if ($model->load(Yii::$app->request->post()) && $model_direcciones->load(Yii::$app->request->post())) {
            $model->fl_nacimiento = date_format(date_create($model->fl_nacimiento), 'Y-m-d');
            $model->foto = \yii\web\UploadedFile::getInstance($model, 'foto');
            $model_direcciones->lat = floatval($model_direcciones->lat);
            $model_direcciones->lng = floatval($model_direcciones->lng);

            if (!Direcciones::find()->where(['claveforeana' => $model->id_persona, 'tabla_referen' => $model->tableName()])->one() !== null)
                $model_direcciones->visibilidad = 1;

            if ($model->save()) {
                $model_direcciones->claveforeana = "".$model->id_persona;
                $model_direcciones->tabla_referen = $model->tableName();
                $model->img_new();

                if ($model_direcciones->save())
                    return $this->redirect(['view', 'id' => $model->id_persona]);
                else
                    return $this->render('update', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
            } else {
                return $this->render('update', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
            }
        } else {
            return $this->render('update', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
        }

    }

    /**
     * Deletes an existing Personas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);

    }

    public function actionUdpswitch($id) {
        $model = $this->findModel($id);
        $model->status = ($model->status == 0) ? 1 : 0;
        $model->save();
        return;

    }

    /**
     * Finds the Personas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Personas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

}
