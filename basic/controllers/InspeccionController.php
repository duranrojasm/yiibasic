<?php

namespace app\controllers;

use Yii;
use app\models\Inspeccion;
use app\models\InspeccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Multimedia;
use yii\web\UploadedFile;
use app\models\EstadoItemIsnpeccion;
use app\models\EstadoItemIsnpeccionSearch;
use app\models\Item;
use app\models\Nodo;
use app\models\Estacion;
use app\models\Radio;
use app\models\Model;
use app\models\RadioCarac;
use yii\helpers\ArrayHelper;
/**
 * InspeccionController implements the CRUD actions for Inspeccion model.
 */
class InspeccionController extends Controller
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
     * Lists all Inspeccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InspeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,3);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexestacion()
    {
        $searchModel = new InspeccionSearch();

        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1);
        
            return $this->render('indexestacion', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);    # code...
        
    }

    public function actionIndexradios()
    {
        $searchModel = new InspeccionSearch();

        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,2);
        
            return $this->render('indexradios', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);    # code...
        
    }


    /**
     * Displays a single Inspeccion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewestacion($id)
    {
        return $this->render('viewestacion', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionViewradio($id)
    {
        return $this->render('viewradio', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Inspeccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inspeccion();
        $Archivo = new Multimedia();
        $nodo = new Nodo();
        $modelsEstadoItemIns = [new EstadoItemIsnpeccion];    

        $model->fecha_asig= date('d-m-Y');
        $model->fecha_insp= date('d-m-Y');
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $Archivo->inspeccion_idinspeccion = $model->idinspeccion;

            //creando la carpeta
            if (!file_exists('\web\uploads/' .$model->idinspeccion)) {
                mkdir(Yii::$app->basePath .'/web/uploads/'.$model->nodoIdnodo->nombre.'-'.$model->idinspeccion, 0777, true);
            }
            
            //Almacenando los archivs

            Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\uploads\/'.$model->nodoIdnodo->nombre.'-'.$model->idinspeccion.'/';
            $Archivo->image = UploadedFile::getInstances($Archivo, 'multimedia');
            if ($Archivo->image) {
                foreach ($Archivo->image as $file) {
                    $path = Yii::$app->params['uploadPath'];
                    $file->saveAs($path.$file->baseName.'.'.$file->extension);
                    
                    $ArchivoS = new Multimedia();
                    $ArchivoS->inspeccion_idinspeccion= $model->idinspeccion;
                    $ArchivoS->multimedia= $file->name;
                    $ArchivoS->save();
                }
            }


            $modelsEstadoItemIns = Model::createMultiple(EstadoItemIsnpeccion::classname());
            Model::loadMultiple($modelsEstadoItemIns, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEstadoItemIns) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsEstadoItemIns as $modelsEstadoItemIns) {
                            $modelsEstadoItemIns->inspeccion_idinspeccion = $model->idinspeccion;
                            if (! ($flag = $modelsEstadoItemIns->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idinspeccion]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            return $this->redirect(['view', 'id' => $model->idinspeccion]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'archivo'=>$Archivo,
                'modelsEstadoItemIns'=>(empty($modelsEstadoItemIns)) ? [new EstadoItemIsnpeccion] : $modelsEstadoItemIns
            ]);
        }
    }



    public function actionEstacion()
    {
        $model = new Inspeccion();
        $Archivo = new Multimedia();
        $estacion = new Estacion();
        $modelsEstadoItemIns = [new EstadoItemIsnpeccion];    
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $Archivo->inspeccion_idinspeccion = $model->idinspeccion;

            //creando la carpeta
            if (!file_exists('\web\uploads/' .$model->idinspeccion)) {
                mkdir(Yii::$app->basePath .'/web/uploads/'.$model->estacionIdestacion->nombre.'-'.$model->idinspeccion, 0777, true);
            }
            
            //Almacenando los archivs

            Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\uploads\/'.$model->estacionIdestacion->nombre.'-'.$model->idinspeccion.'/';
            $Archivo->image = UploadedFile::getInstances($Archivo, 'multimedia');
            if ($Archivo->image) {
                foreach ($Archivo->image as $file) {
                    $path = Yii::$app->params['uploadPath'];
                    $file->saveAs($path.$file->baseName.'.'.$file->extension);
                    
                    $ArchivoS = new Multimedia();
                    $ArchivoS->inspeccion_idinspeccion= $model->idinspeccion;
                    $ArchivoS->multimedia= $file->name;
                    $ArchivoS->save();
                }
            }


            $modelsEstadoItemIns = Model::createMultiple(EstadoItemIsnpeccion::classname());
            Model::loadMultiple($modelsEstadoItemIns, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEstadoItemIns) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsEstadoItemIns as $modelsEstadoItemIns) {
                            $modelsEstadoItemIns->inspeccion_idinspeccion = $model->idinspeccion;
                            if (! ($flag = $modelsEstadoItemIns->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['viewestacion', 'id' => $model->idinspeccion]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            return $this->redirect(['viewestacion', 'id' => $model->idinspeccion]);
        } else {
            return $this->render('estacion', [
                'model' => $model,
                'archivo'=>$Archivo,
                'modelsEstadoItemIns'=>(empty($modelsEstadoItemIns)) ? [new EstadoItemIsnpeccion] : $modelsEstadoItemIns
            ]);
        }
    }


    public function getActividadAtraso($id){
    
            $atraso=Yii::app()->db->createCommand("select DATEDIFF(CURDATE(),proximoFecha) as atraso from sgu_actividades where id=".$id."")->queryRow();
            return $atraso["atraso"];
    }

    public function actionRadio()
    {
        $model = new Inspeccion();
        $Archivo = new Multimedia();
        $radio = new Radio();
        $modelsRadio = [new RadioCarac];    
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $Archivo->inspeccion_idinspeccion = $model->idinspeccion;

            //creando la carpeta
            if (!file_exists('\web\uploads/' .$model->idinspeccion)) {
                mkdir(Yii::$app->basePath .'/web/uploads/'.$model->radioIdradio->nombre.'-'.$model->idinspeccion, 0777, true);
            }
            
            //Almacenando los archivs

            Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\uploads\/'.$model->radioIdradio->nombre.'-'.$model->idinspeccion.'/';
            $Archivo->image = UploadedFile::getInstances($Archivo, 'multimedia');
            if ($Archivo->image) {
                foreach ($Archivo->image as $file) {
                    $path = Yii::$app->params['uploadPath'];
                    $file->saveAs($path.$file->baseName.'.'.$file->extension);
                    
                    $ArchivoS = new Multimedia();
                    $ArchivoS->inspeccion_idinspeccion= $model->idinspeccion;
                    $ArchivoS->multimedia= $file->name;
                    $ArchivoS->save();
                }
            }


            $modelsRadio = Model::createMultiple(RadioCarac::classname());
            Model::loadMultiple($modelsRadio, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsRadio) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsRadio as $modelsRadio) {
                            $modelsRadio->inspeccion_idinspeccion = $model->idinspeccion;
                            if (! ($flag = $modelsRadio->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['viewradio', 'id' => $model->idinspeccion]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            return $this->redirect(['viewradio', 'id' => $model->idinspeccion]);
        } else {
            return $this->render('radio', [
                'model' => $model,
                'archivo'=>$Archivo,
                'modelsRadio'=>(empty($modelsRadio)) ? [new RadioCarac] : $modelsRadio
            ]);
        }
    }


    /**
     * Updates an existing Inspeccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsEstadoItemIns = $model->estadoItemIsnpeccions;
        $Archivo = new Multimedia();


         if ($model->load(Yii::$app->request->post())) {

            $Archivo->inspeccion_idinspeccion = $model->idinspeccion;
            Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\uploads\/'.$model->nodoIdnodo->nombre.'-'.$model->idinspeccion.'/';
            $Archivo->image = UploadedFile::getInstances($Archivo, 'multimedia');
            if ($Archivo->image) {
                foreach ($Archivo->image as $file) {
                    $path = Yii::$app->params['uploadPath'];
                    $file->saveAs($path.$file->baseName.'.'.$file->extension);
                    
                    $ArchivoS = new Multimedia();
                    $ArchivoS->inspeccion_idinspeccion= $model->idinspeccion;
                    $ArchivoS->multimedia= $file->name;
                    $ArchivoS->save();
                }
            }

            $oldIDs = ArrayHelper::map($modelsEstadoItemIns, 'inspeccion_idinspeccion', 'inspeccion_idinspeccion');
            $modelsEstadoItemIns = Model::createMultiple(EstadoItemIsnpeccion::classname(), $modelsEstadoItemIns);
            Model::loadMultiple($modelsEstadoItemIns, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsEstadoItemIns, 'inspeccion_idinspeccion', 'item_iditem')));


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEstadoItemIns) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            EstadoItemIsnpeccion::deleteAll(['inspeccion_idinspeccion' => $deletedIDs]);
                        }
                        foreach ($modelsEstadoItemIns as $modelsEstadoItemIns) {
                            $modelsEstadoItemIns->inspeccion_idinspeccion = $model->idinspeccion;

                            if (! ($flag = $modelsEstadoItemIns->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idinspeccion]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsEstadoItemIns' => (empty($modelsEstadoItemIns)) ? [new EstadoItemIsnpeccion] : $modelsEstadoItemIns
            ]);
        }
    }

    /**
     * Deletes an existing Inspeccion model.
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
     * Finds the Inspeccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inspeccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inspeccion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
