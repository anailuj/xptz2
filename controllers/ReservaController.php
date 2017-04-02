<?php

namespace app\controllers;

use Yii;
use app\models\Reserva;
use app\models\ReservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservaController implements the CRUD actions for Reserva model.
 */
class ReservaController extends BaseController
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all Reserva models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reserva model.
     * @param integer $cliente_id
     * @param integer $veiculo_id
     * @return mixed
     */
    public function actionView($cliente_id, $veiculo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cliente_id, $veiculo_id),
        ]);
    }

    /**
     * Creates a new Reserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reserva();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cliente_id' => $model->cliente_id, 'veiculo_id' => $model->veiculo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $cliente_id
     * @param integer $veiculo_id
     * @return mixed
     */
    public function actionUpdate($cliente_id, $veiculo_id)
    {
        $model = $this->findModel($cliente_id, $veiculo_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cliente_id' => $model->cliente_id, 'veiculo_id' => $model->veiculo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reserva model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $cliente_id
     * @param integer $veiculo_id
     * @return mixed
     */
    public function actionDelete($cliente_id, $veiculo_id)
    {
        $this->findModel($cliente_id, $veiculo_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $cliente_id
     * @param integer $veiculo_id
     * @return Reserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cliente_id, $veiculo_id)
    {
        if (($model = Reserva::findOne(['cliente_id' => $cliente_id, 'veiculo_id' => $veiculo_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
