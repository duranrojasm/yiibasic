<?php

namespace app\controllers;

use Yii;
use app\models\EnlaceSatelitalCarac;
use app\models\EnlaceSatelitalCaracSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnlaceSatelitalCaracController implements the CRUD actions for EnlaceSatelitalCarac model.
 */
class EnlaceSatelitalCaracController extends Controller
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
     * Lists all EnlaceSatelitalCarac models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnlaceSatelitalCaracSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EnlaceSatelitalCarac model.
     * @param integer $caracteristica_es_idcaracteristica
     * @param integer $enlace_satelital_idenlace_satelital
     * @return mixed
     */
    public function actionView($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital)
    {
        return $this->render('view', [
            'model' => $this->findModel($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital),
        ]);
    }

    /**
     * Creates a new EnlaceSatelitalCarac model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnlaceSatelitalCarac();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caracteristica_es_idcaracteristica' => $model->caracteristica_es_idcaracteristica, 'enlace_satelital_idenlace_satelital' => $model->enlace_satelital_idenlace_satelital]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EnlaceSatelitalCarac model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $caracteristica_es_idcaracteristica
     * @param integer $enlace_satelital_idenlace_satelital
     * @return mixed
     */
    public function actionUpdate($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital)
    {
        $model = $this->findModel($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caracteristica_es_idcaracteristica' => $model->caracteristica_es_idcaracteristica, 'enlace_satelital_idenlace_satelital' => $model->enlace_satelital_idenlace_satelital]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EnlaceSatelitalCarac model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $caracteristica_es_idcaracteristica
     * @param integer $enlace_satelital_idenlace_satelital
     * @return mixed
     */
    public function actionDelete($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital)
    {
        $this->findModel($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EnlaceSatelitalCarac model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $caracteristica_es_idcaracteristica
     * @param integer $enlace_satelital_idenlace_satelital
     * @return EnlaceSatelitalCarac the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($caracteristica_es_idcaracteristica, $enlace_satelital_idenlace_satelital)
    {
        if (($model = EnlaceSatelitalCarac::findOne(['caracteristica_es_idcaracteristica' => $caracteristica_es_idcaracteristica, 'enlace_satelital_idenlace_satelital' => $enlace_satelital_idenlace_satelital])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
