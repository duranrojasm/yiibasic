<?php

namespace app\controllers;

use Yii;
use app\models\Radio;
use app\models\EstructurEq;
use app\models\RadioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Estructura;

/**
 * RadioController implements the CRUD actions for Radio model.
 */
class RadioController extends Controller
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
     * Lists all Radio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RadioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Radio model.
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
     * Creates a new Radio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Radio();
        $estruc = new EstructurEq();

        if ($model->load(Yii::$app->request->post()) &&  $estruc->load(Yii::$app->request->post())) {

            $model->save(false);
            $estruc->radio_idradio = $model->idradio;
            $estruc->save();

            return $this->redirect(['view', 'id' => $model->idradio]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'estruc' => $estruc,
            ]);
        }
    }

    /**
     * Updates an existing Radio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Radio::findOne($id);
        $estruc = EstructurEq::findOne($id);

        if (!isset($model, $estruc)) {
            throw new NotFoundHttpException("No se localiza los datos, alguno de ellos fue eliminado");
        }

        

        if ($model->load(Yii::$app->request->post()) && $estruc->load(Yii::$app->request->post())) {
          
            
                $model->save(false);
                $estruc->save(false);
                return $this->redirect(['view', 'id' => $id]);
            }
        

        return $this->render('update', [
            'model' => $model,
            'estruc' => $estruc,
        ]);

       
    }

    /**
     * Deletes an existing Radio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       

         $person=EstructurEq::findOne(['radio_idradio'=>$id]);
         $p=count($person);
         if($p == 1){
         $person->delete();
         }
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);

    }

    public function actionLists($id)
    {
        $countPosts = Estructura::find()
                ->where(['estacion_idestacion' => $id])
                ->count();
 
        $posts = Estructura::find()
                ->where(['estacion_idestacion' => $id])
                ->all();
 
        if($countPosts>0){
            echo "<option value=1>Seleccione una estructura</option>";
            foreach($posts as $post){

                echo "<option value='".$post->idestructura."'>".$post->nombre."</option>";
            }
        }
        else{
            echo "<option value=1>Seleccione una estructura</option>";
        }
 
    }

    /**
     * Finds the Radio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Radio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Radio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
