<?php

namespace app\controllers;

use Yii;
use app\models\UsuarioImpSegdad;
use app\models\UsuarioImpSegdadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioImpSegdadController implements the CRUD actions for UsuarioImpSegdad model.
 */
class UsuarioImpSegdadController extends Controller
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
     * Lists all UsuarioImpSegdad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioImpSegdadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuarioImpSegdad model.
     * @param integer $implemento_segurd_idimplemento_segurd
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionView($implemento_segurd_idimplemento_segurd, $usuario_idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($implemento_segurd_idimplemento_segurd, $usuario_idusuario),
        ]);
    }

    /**
     * Creates a new UsuarioImpSegdad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuarioImpSegdad();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'implemento_segurd_idimplemento_segurd' => $model->implemento_segurd_idimplemento_segurd, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsuarioImpSegdad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $implemento_segurd_idimplemento_segurd
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionUpdate($implemento_segurd_idimplemento_segurd, $usuario_idusuario)
    {
        $model = $this->findModel($implemento_segurd_idimplemento_segurd, $usuario_idusuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'implemento_segurd_idimplemento_segurd' => $model->implemento_segurd_idimplemento_segurd, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsuarioImpSegdad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $implemento_segurd_idimplemento_segurd
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionDelete($implemento_segurd_idimplemento_segurd, $usuario_idusuario)
    {
        $this->findModel($implemento_segurd_idimplemento_segurd, $usuario_idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsuarioImpSegdad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $implemento_segurd_idimplemento_segurd
     * @param integer $usuario_idusuario
     * @return UsuarioImpSegdad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($implemento_segurd_idimplemento_segurd, $usuario_idusuario)
    {
        if (($model = UsuarioImpSegdad::findOne(['implemento_segurd_idimplemento_segurd' => $implemento_segurd_idimplemento_segurd, 'usuario_idusuario' => $usuario_idusuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
