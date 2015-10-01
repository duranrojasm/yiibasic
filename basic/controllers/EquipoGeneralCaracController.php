<?php

namespace app\controllers;

use Yii;
use app\models\EquipoGeneralCarac;
use app\models\EquipoGeneralCaracSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquipoGeneralCaracController implements the CRUD actions for EquipoGeneralCarac model.
 */
class EquipoGeneralCaracController extends Controller
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
     * Lists all EquipoGeneralCarac models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquipoGeneralCaracSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EquipoGeneralCarac model.
     * @param integer $caractersticas_em_idcaractersticas_em
     * @param integer $equipo_general_idequipo_general
     * @return mixed
     */
    public function actionView($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general)
    {
        return $this->render('view', [
            'model' => $this->findModel($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general),
        ]);
    }

    /**
     * Creates a new EquipoGeneralCarac model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EquipoGeneralCarac();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caractersticas_em_idcaractersticas_em' => $model->caractersticas_em_idcaractersticas_em, 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EquipoGeneralCarac model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $caractersticas_em_idcaractersticas_em
     * @param integer $equipo_general_idequipo_general
     * @return mixed
     */
    public function actionUpdate($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general)
    {
        $model = $this->findModel($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caractersticas_em_idcaractersticas_em' => $model->caractersticas_em_idcaractersticas_em, 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EquipoGeneralCarac model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $caractersticas_em_idcaractersticas_em
     * @param integer $equipo_general_idequipo_general
     * @return mixed
     */
    public function actionDelete($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general)
    {
        $this->findModel($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EquipoGeneralCarac model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $caractersticas_em_idcaractersticas_em
     * @param integer $equipo_general_idequipo_general
     * @return EquipoGeneralCarac the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($caractersticas_em_idcaractersticas_em, $equipo_general_idequipo_general)
    {
        if (($model = EquipoGeneralCarac::findOne(['caractersticas_em_idcaractersticas_em' => $caractersticas_em_idcaractersticas_em, 'equipo_general_idequipo_general' => $equipo_general_idequipo_general])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
