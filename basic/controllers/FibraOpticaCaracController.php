<?php

namespace app\controllers;

use Yii;
use app\models\FibraOpticaCarac;
use app\models\FibraOpticaCaracSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FibraOpticaCaracController implements the CRUD actions for FibraOpticaCarac model.
 */
class FibraOpticaCaracController extends Controller
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
     * Lists all FibraOpticaCarac models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FibraOpticaCaracSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FibraOpticaCarac model.
     * @param integer $caracteristica_fo_idcaracteristica
     * @param integer $fibra_optica_idfibra_optica
     * @return mixed
     */
    public function actionView($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica)
    {
        return $this->render('view', [
            'model' => $this->findModel($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica),
        ]);
    }

    /**
     * Creates a new FibraOpticaCarac model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FibraOpticaCarac();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caracteristica_fo_idcaracteristica' => $model->caracteristica_fo_idcaracteristica, 'fibra_optica_idfibra_optica' => $model->fibra_optica_idfibra_optica]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FibraOpticaCarac model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $caracteristica_fo_idcaracteristica
     * @param integer $fibra_optica_idfibra_optica
     * @return mixed
     */
    public function actionUpdate($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica)
    {
        $model = $this->findModel($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caracteristica_fo_idcaracteristica' => $model->caracteristica_fo_idcaracteristica, 'fibra_optica_idfibra_optica' => $model->fibra_optica_idfibra_optica]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FibraOpticaCarac model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $caracteristica_fo_idcaracteristica
     * @param integer $fibra_optica_idfibra_optica
     * @return mixed
     */
    public function actionDelete($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica)
    {
        $this->findModel($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FibraOpticaCarac model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $caracteristica_fo_idcaracteristica
     * @param integer $fibra_optica_idfibra_optica
     * @return FibraOpticaCarac the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($caracteristica_fo_idcaracteristica, $fibra_optica_idfibra_optica)
    {
        if (($model = FibraOpticaCarac::findOne(['caracteristica_fo_idcaracteristica' => $caracteristica_fo_idcaracteristica, 'fibra_optica_idfibra_optica' => $fibra_optica_idfibra_optica])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
