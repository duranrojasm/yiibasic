<?php

namespace app\controllers;

use Yii;
use app\models\UsuarioInspeccion;
use app\models\UsuarioInspeccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioInspeccionController implements the CRUD actions for UsuarioInspeccion model.
 */
class UsuarioInspeccionController extends Controller
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
     * Lists all UsuarioInspeccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioInspeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuarioInspeccion model.
     * @param integer $inspeccion_idinspeccion
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionView($inspeccion_idinspeccion, $usuario_idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($inspeccion_idinspeccion, $usuario_idusuario),
        ]);
    }

    /**
     * Creates a new UsuarioInspeccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuarioInspeccion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsuarioInspeccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $inspeccion_idinspeccion
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionUpdate($inspeccion_idinspeccion, $usuario_idusuario)
    {
        $model = $this->findModel($inspeccion_idinspeccion, $usuario_idusuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsuarioInspeccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $inspeccion_idinspeccion
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionDelete($inspeccion_idinspeccion, $usuario_idusuario)
    {
        $this->findModel($inspeccion_idinspeccion, $usuario_idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsuarioInspeccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $inspeccion_idinspeccion
     * @param integer $usuario_idusuario
     * @return UsuarioInspeccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($inspeccion_idinspeccion, $usuario_idusuario)
    {
        if (($model = UsuarioInspeccion::findOne(['inspeccion_idinspeccion' => $inspeccion_idinspeccion, 'usuario_idusuario' => $usuario_idusuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
