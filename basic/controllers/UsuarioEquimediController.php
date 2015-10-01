<?php

namespace app\controllers;

use Yii;
use app\models\UsuarioEquimedi;
use app\models\UsuarioEquimediSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioEquimediController implements the CRUD actions for UsuarioEquimedi model.
 */
class UsuarioEquimediController extends Controller
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
     * Lists all UsuarioEquimedi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioEquimediSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuarioEquimedi model.
     * @param integer $equipo_general_idequipo_general
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionView($equipo_general_idequipo_general, $usuario_idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($equipo_general_idequipo_general, $usuario_idusuario),
        ]);
    }

    /**
     * Creates a new UsuarioEquimedi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuarioEquimedi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsuarioEquimedi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $equipo_general_idequipo_general
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionUpdate($equipo_general_idequipo_general, $usuario_idusuario)
    {
        $model = $this->findModel($equipo_general_idequipo_general, $usuario_idusuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general, 'usuario_idusuario' => $model->usuario_idusuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsuarioEquimedi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $equipo_general_idequipo_general
     * @param integer $usuario_idusuario
     * @return mixed
     */
    public function actionDelete($equipo_general_idequipo_general, $usuario_idusuario)
    {
        $this->findModel($equipo_general_idequipo_general, $usuario_idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsuarioEquimedi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $equipo_general_idequipo_general
     * @param integer $usuario_idusuario
     * @return UsuarioEquimedi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($equipo_general_idequipo_general, $usuario_idusuario)
    {
        if (($model = UsuarioEquimedi::findOne(['equipo_general_idequipo_general' => $equipo_general_idequipo_general, 'usuario_idusuario' => $usuario_idusuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
