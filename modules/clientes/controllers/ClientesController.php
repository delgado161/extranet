<?php

namespace app\modules\clientes\controllers;

use Yii;
use app\modules\clientes\models\Clientes;
use app\modules\clientes\models\ClientesSEARCH;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\usuarios\models\Direcciones;
use app\modules\clientes\models\ClienteContacto;

/**
 * ClientesController implements the CRUD actions for Clientes model.
 */
class ClientesController extends Controller {

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
     * Lists all Clientes models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ClientesSEARCH();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Clientes model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        if (Direcciones::find()->where(['claveforeana' => $model->id_cliente, 'tabla_referen' => $model->tableName()])->one() !== null)
            $model_direcciones = Direcciones::find()->where(['claveforeana' => $model->id_cliente, 'tabla_referen' => $model->tableName()])->one();
        else
            $model_direcciones = new Direcciones();

        return $this->render('view', ['model' => $model, 'model_direcciones' => $model_direcciones,]);
//        return $this->render('view', [
//                    'model' => $this->findModel($id),
//        ]);

    }

    /**
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {


        $model = new Clientes();
        $model_direcciones = new Direcciones();

        if ($model->load(Yii::$app->request->post()) && $model_direcciones->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->id_cliente = Yii::$app->Toolbox->randomText(5, $model->tableName(), 'id_cliente');

            $model_direcciones->lat = floatval($model_direcciones->lat);
            $model_direcciones->lng = floatval($model_direcciones->lng);
            $model_direcciones->visibilidad = 1;

            if ($model->save()) {
                $model_direcciones->claveforeana = $model->id_cliente;
                $model_direcciones->tabla_referen = $model->tableName();
                $model_direcciones->save();


                if ($_POST['List_Clientes']) {
                    foreach ($_POST['List_Clientes'] as $key => $valor) {
                        $ClienteContacto = new ClienteContacto();
                        $ClienteContacto->fk_persona = $key;
                        $ClienteContacto->fk_cliente = $model->id_cliente;
                        $ClienteContacto->save();
                    }
                }
                Yii::$app->Toolbox->MSJ_SUCCESS('Creada Correctamente', 'Cliente: ' . $model->nombre, ['bottom', 'right']);
//                return $this->redirect(Yii::$app->Toolbox->verificar_modal(['view', 'id' => $model->id_cliente]));
//                return $this->render('create', ['model' => $model, 'model_direcciones' => $model_direcciones, 'Lista_contactos' => $_POST['List_Clientes']]);
                return $this->redirect(['view', 'id' => $model->id_cliente]);
            } else {
                return $this->render('create', ['model' => $model, 'model_direcciones' => $model_direcciones, 'Lista_contactos' => $_POST['List_Clientes']]);
            }
//         
        } else {
            return $this->render('create', ['model' => $model, 'model_direcciones' => $model_direcciones, 'Lista_contactos' => array()]);
        }

    }

    /**
     * Updates an existing Clientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cliente]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Clientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    }

    /**
     * Finds the Clientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Clientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Clientes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    public function actionUdpswitch($id) {
        $model = $this->findModel($id);
        $model->status = ($model->status == 0) ? 1 : 0;
        $model->save();
        return;

    }

}
