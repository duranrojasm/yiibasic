<?php

namespace app\controllers;

use Yii;
use app\models\EstructurEq;
use app\models\EstructurEqSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstructurEqController implements the CRUD actions for EstructurEq model.
 */
class EstructurEqController extends Controller
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
     * Lists all EstructurEq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstructurEqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstructurEq model.
     * @param integer $radio_idradio
     * @param integer $estructura_idestructura
     * @return mixed
     */
    public function actionView($radio_idradio, $estructura_idestructura)
    {
        return $this->render('view', [
            'model' => $this->findModel($radio_idradio, $estructura_idestructura),
        ]);
    }

    /**
     * Creates a new EstructurEq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstructurEq();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'radio_idradio' => $model->radio_idradio, 'estructura_idestructura' => $model->estructura_idestructura]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EstructurEq model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $radio_idradio
     * @param integer $estructura_idestructura
     * @return mixed
     */
    public function actionUpdate($radio_idradio, $estructura_idestructura)
    {
        $model = $this->findModel($radio_idradio, $estructura_idestructura);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'radio_idradio' => $model->radio_idradio, 'estructura_idestructura' => $model->estructura_idestructura]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstructurEq model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $radio_idradio
     * @param integer $estructura_idestructura
     * @return mixed
     */
    public function actionDelete($radio_idradio, $estructura_idestructura)
    {
        $this->findModel($radio_idradio, $estructura_idestructura)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstructurEq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $radio_idradio
     * @param integer $estructura_idestructura
     * @return EstructurEq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($radio_idradio, $estructura_idestructura)
    {
        if (($model = EstructurEq::findOne(['radio_idradio' => $radio_idradio, 'estructura_idestructura' => $estructura_idestructura])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
