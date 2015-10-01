<?php

namespace app\controllers;

use Yii;
use app\models\UsuarioReportef;
use app\models\UsuarioReportefSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioReportefController implements the CRUD actions for UsuarioReportef model.
 */
class UsuarioReportefController extends Controller
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
     * Lists all UsuarioReportef models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioReportefSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuarioReportef model.
     * @param integer $reporte_falla_idreporte_falla
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionView($reporte_falla_idreporte_falla, $usuario_idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($reporte_falla_idreporte_falla, $usuario_idusuario),
        ]);
    }

    /**
     * Creates a new UsuarioReportef model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuarioReportef();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsuarioReportef model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $reporte_falla_idreporte_falla
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionUpdate($reporte_falla_idreporte_falla, $usuario_idusuario)
    {
        $model = $this->findModel($reporte_falla_idreporte_falla, $usuario_idusuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsuarioReportef model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $reporte_falla_idreporte_falla
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionDelete($reporte_falla_idreporte_falla, $usuario_idusuario)
    {
        $this->findModel($reporte_falla_idreporte_falla, $usuario_idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsuarioReportef model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $reporte_falla_idreporte_falla
     * @param integer $usuario_idusuario
     * @return UsuarioReportef the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($reporte_falla_idreporte_falla, $usuario_idusuario)
    {
        if (($model = UsuarioReportef::findOne(['reporte_falla_idreporte_falla' => $reporte_falla_idreporte_falla, 'usuario_idusuario' => $usuario_idusuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
