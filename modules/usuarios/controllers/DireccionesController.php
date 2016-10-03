<?php

namespace app\modules\usuarios\controllers;

use Yii;
use app\modules\usuarios\models\Direcciones;
use app\modules\usuarios\models\DireccionesSEARCH;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \app\modules\configuraciones\models\Estados;
use \app\modules\configuraciones\models\Municipios;
use \app\modules\configuraciones\models\Parroquias;

/**
 * DireccionesController implements the CRUD actions for Direcciones model.
 */
class DireccionesController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
//                    'estado' => ['POST'],
                ],
            ],
        ];

    }

    /**
     * Lists all Direcciones models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DireccionesSEARCH();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Direcciones model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Direcciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Direcciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lp_direccion_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Direcciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lp_direccion_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Direcciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    }

    /**
     * Finds the Direcciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Direcciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Direcciones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    public function actionEstado() {
        $countEstado = Estados::find()
                ->where(['lf_estado_pais' => $_POST['id']])
                ->count();

        $estaddo = Estados::find()
                ->where(['lf_estado_pais' => $_POST['id']])
                ->orderBy('nombre ASC')
                ->all();

        if ($countEstado > 0) {
            echo "<option>Seleccione...</option>";
            foreach ($estaddo as $post) {
                echo "<option value='" . $post->lp_estado_id . "'>" . $post->nombre . "</option>";
            }
        } else {
            echo "<option>Seleccione...</option>";
        }

    }

    public function actionMunicipio() {
        $countMunicipios = Municipios::find()
                ->where(['lf_municipio_estado' => $_POST['id']])
                ->count();

        $municipio = Municipios::find()
                ->where(['lf_municipio_estado' => $_POST['id']])
                ->orderBy('nombre ASC')
                ->all();

        if ($countMunicipios > 0) {
            echo "<option>Seleccione...</option>";
            foreach ($municipio as $post) {
                echo "<option value='" . $post->lp_municipio_id . "'>" . $post->nombre . "</option>";
            }
        } else {
            echo "<option>Seleccione...</option>";
        }

    }

    public function actionParroquia() {
        $countParroquias = Parroquias::find()
                ->where(['lf_parroquia_municipio' => $_POST['id']])
                ->count();

        $parroquias = Parroquias::find()
                ->where(['lf_parroquia_municipio' => $_POST['id']])
                ->orderBy('nombre ASC')
                ->all();

        if ($countParroquias > 0) {
            echo "<option>Seleccione...</option>";
            foreach ($parroquias as $post) {
                echo "<option value='" . $post->lp_parroquia_id . "'>" . $post->nombre . "</option>";
            }
        } else {
            echo "<option>Seleccione...</option>";
        }

    }

}
