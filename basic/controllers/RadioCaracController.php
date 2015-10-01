<?php

namespace app\controllers;

use Yii;
use app\models\RadioCarac;
use app\models\RadioCaracSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RadioCaracController implements the CRUD actions for RadioCarac model.
 */
class RadioCaracController extends Controller
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
     * Lists all RadioCarac models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RadioCaracSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RadioCarac model.
     * @param integer $caracteristicasrad_idcaracteristicas
     * @param integer $radio_idradio
     * @return mixed
     */
    public function actionView($caracteristicasrad_idcaracteristicas, $radio_idradio)
    {
        return $this->render('view', [
            'model' => $this->findModel($caracteristicasrad_idcaracteristicas, $radio_idradio),
        ]);
    }

    /**
     * Creates a new RadioCarac model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RadioCarac();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caracteristicasrad_idcaracteristicas' => $model->caracteristicasrad_idcaracteristicas, 'radio_idradio' => $model->radio_idradio]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RadioCarac model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $caracteristicasrad_idcaracteristicas
     * @param integer $radio_idradio
     * @return mixed
     */
    public function actionUpdate($caracteristicasrad_idcaracteristicas, $radio_idradio)
    {
        $model = $this->findModel($caracteristicasrad_idcaracteristicas, $radio_idradio);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caracteristicasrad_idcaracteristicas' => $model->caracteristicasrad_idcaracteristicas, 'radio_idradio' => $model->radio_idradio]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RadioCarac model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $caracteristicasrad_idcaracteristicas
     * @param integer $radio_idradio
     * @return mixed
     */
    public function actionDelete($caracteristicasrad_idcaracteristicas, $radio_idradio)
    {
        $this->findModel($caracteristicasrad_idcaracteristicas, $radio_idradio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RadioCarac model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $caracteristicasrad_idcaracteristicas
     * @param integer $radio_idradio
     * @return RadioCarac the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($caracteristicasrad_idcaracteristicas, $radio_idradio)
    {
        if (($model = RadioCarac::findOne(['caracteristicasrad_idcaracteristicas' => $caracteristicasrad_idcaracteristicas, 'radio_idradio' => $radio_idradio])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
