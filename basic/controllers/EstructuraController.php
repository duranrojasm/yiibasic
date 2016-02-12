<?php

namespace app\controllers;

use Yii;
use app\models\Estructura;
use app\models\EstructurEq;
use app\models\Radio;
use app\models\EstructuraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstructuraController implements the CRUD actions for Estructura model.
 */
class EstructuraController extends Controller
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
     * Lists all Estructura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstructuraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estructura model.
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
     * Creates a new Estructura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estructura();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idestructura]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Estructura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idestructura]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Estructura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        

        $report=EstructurEq::find()->where(['=', 'estructura_idestructura', $id])->all();
        $c=count($report);
        
        $ids[]='';

        foreach ($report as $value) {
            $ids[]=$value->radio_idradio;
        }

        for ($i=1; $i < ($c+1); $i++) { 

            $person=EstructurEq::findOne(['radio_idradio'=>$ids[$i]]);
            $person->delete();
            $personaux=Radio::findOne($ids[$i]);
            $personaux->delete();

        }

        $this->findModel($id)->delete();
        return $this->redirect(['index']);

    }

    public function actionLists($id,$tip)
    {
        $countPosts = Estructura::find()
                ->where(['estacion_idestacion' => $id,'tipo_estructura_idtipo_estructura' => $tip])
                ->count();
 
        $posts = Estructura::find()
                ->where(['estacion_idestacion' => $id, 'tipo_estructura_idtipo_estructura' => $tip])
                ->all();
 
        if($countPosts>0){
            echo "<option>Seleccione una estructura</option>";
            foreach($posts as $post){

                echo "<option value='".$post->idestructura."'>".$post->nombre."</option>";
            }
        }
        else{
            echo "<option>Seleccione una estructura</option>";
        }
 
    }

     public function actionLista($id)
    {
        $countPosts = Estructura::find()
                ->where(['estacion_idestacion' => $id])
                ->count();
 
        $posts = Estructura::find()
                ->where(['estacion_idestacion' => $id])
                ->all();
 
        if($countPosts>0){
            echo "<option>Seleccione una estructura</option>";
            foreach($posts as $post){

                echo "<option value='".$post->idestructura."'>".$post->nombre."</option>";
            }
        }
        else{
            echo "<option>Seleccione una estructura</option>";
        }
 
    }

    /**
     * Finds the Estructura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estructura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estructura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
