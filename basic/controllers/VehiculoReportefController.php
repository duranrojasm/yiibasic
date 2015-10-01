<?php

namespace app\controllers;

use Yii;
use app\models\VehiculoReportef;
use app\models\VehiculoReportefSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VehiculoReportefController implements the CRUD actions for VehiculoReportef model.
 */
class VehiculoReportefController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all VehiculoReportef models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehiculoReportefSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VehiculoReportef model.
     * @param integer $vehiculo_idvehiculo
     * @param integer $reporte_falla_idreporte_falla
     * @return mixed
     */
    public function actionView($vehiculo_idvehiculo, $reporte_falla_idreporte_falla)
    {
        return $this->render('view', [
            'model' => $this->findModel($vehiculo_idvehiculo, $reporte_falla_idreporte_falla),
        ]);
    }

    /**
     * Creates a new VehiculoReportef model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VehiculoReportef();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vehiculo_idvehiculo' => $model->vehiculo_idvehiculo, 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VehiculoReportef model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $vehiculo_idvehiculo
     * @param integer $reporte_falla_idreporte_falla
     * @return mixed
     */
    public function actionUpdate($vehiculo_idvehiculo, $reporte_falla_idreporte_falla)
    {
        $model = $this->findModel($vehiculo_idvehiculo, $reporte_falla_idreporte_falla);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vehiculo_idvehiculo' => $model->vehiculo_idvehiculo, 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VehiculoReportef model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $vehiculo_idvehiculo
     * @param integer $reporte_falla_idreporte_falla
     * @return mixed
     */
    public function actionDelete($vehiculo_idvehiculo, $reporte_falla_idreporte_falla)
    {
        $this->findModel($vehiculo_idvehiculo, $reporte_falla_idreporte_falla)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VehiculoReportef model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $vehiculo_idvehiculo
     * @param integer $reporte_falla_idreporte_falla
     * @return VehiculoReportef the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vehiculo_idvehiculo, $reporte_falla_idreporte_falla)
    {
        if (($model = VehiculoReportef::findOne(['vehiculo_idvehiculo' => $vehiculo_idvehiculo, 'reporte_falla_idreporte_falla' => $reporte_falla_idreporte_falla])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
