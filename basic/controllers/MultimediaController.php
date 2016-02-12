<?php

namespace app\controllers;

use Yii;
use app\models\Multimedia;
use app\models\MultimediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use kartik\widgets\Alert;

/**
 * MultimediaController implements the CRUD actions for Multimedia model.
 */
class MultimediaController extends Controller
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
     * Lists all Multimedia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MultimediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Multimedia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Multimedia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Multimedia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
<<<<<<< HEAD
           $image = UploadedFile::getInstance($model, 'multimedia');
=======
            $image = UploadedFile::getInstance($model, 'multimedia');
>>>>>>> origin/master
             
             // store the source file name
            $model->multimedia = $image->name;
            
            //$ext = end((explode(".", $image->name)));
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '\web\uploads/';
            $path = Yii::$app->params['uploadPath'] .$model->multimedia;
             
             if($model->save()){
                $image->saveAs($path);
                return $this->redirect(['view', 'id' => $model->idmultimedia]);    
            } else {
                return $this->render('create', [
                'model' => $model,
                ]);
            }
<<<<<<< HEAD

=======
>>>>>>> origin/master
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Multimedia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idmultimedia]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Multimedia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Multimedia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Multimedia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Multimedia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
