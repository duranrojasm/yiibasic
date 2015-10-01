<?php

namespace app\controllers;

use Yii;
use app\models\EstadoItemIsnpeccion;
use app\models\EstadoItemIsnpeccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadoItemIsnpeccionController implements the CRUD actions for EstadoItemIsnpeccion model.
 */
class EstadoItemIsnpeccionController extends Controller
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
     * Lists all EstadoItemIsnpeccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstadoItemIsnpeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstadoItemIsnpeccion model.
     * @param integer $inspeccion_idinspeccion
     * @param integer $item_iditem
     * @return mixed
     */
    public function actionView($inspeccion_idinspeccion, $item_iditem)
    {
        return $this->render('view', [
            'model' => $this->findModel($inspeccion_idinspeccion, $item_iditem),
        ]);
    }

    /**
     * Creates a new EstadoItemIsnpeccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstadoItemIsnpeccion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'item_iditem' => $model->item_iditem]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EstadoItemIsnpeccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $inspeccion_idinspeccion
     * @param integer $item_iditem
     * @return mixed
     */
    public function actionUpdate($inspeccion_idinspeccion, $item_iditem)
    {
        $model = $this->findModel($inspeccion_idinspeccion, $item_iditem);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'item_iditem' => $model->item_iditem]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstadoItemIsnpeccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $inspeccion_idinspeccion
     * @param integer $item_iditem
     * @return mixed
     */
    public function actionDelete($inspeccion_idinspeccion, $item_iditem)
    {
        $this->findModel($inspeccion_idinspeccion, $item_iditem)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstadoItemIsnpeccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $inspeccion_idinspeccion
     * @param integer $item_iditem
     * @return EstadoItemIsnpeccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($inspeccion_idinspeccion, $item_iditem)
    {
        if (($model = EstadoItemIsnpeccion::findOne(['inspeccion_idinspeccion' => $inspeccion_idinspeccion, 'item_iditem' => $item_iditem])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
