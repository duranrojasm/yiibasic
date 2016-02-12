<?php

namespace app\controllers;

use Yii;
use app\models\ReporteFalla;
use app\models\Usuario;
use app\models\FibraOptica;
use app\models\UsuarioReportef;
use app\models\ReporteFallaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\Model;
use app\models\Radio;
use app\models\EnlaceSatelital;
use yii\helpers\ArrayHelper;

/**
 * ReporteFallaController implements the CRUD actions for ReporteFalla model.
 */
class ReporteFallaController extends Controller
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
     * Lists all ReporteFalla models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new ReporteFallaSearch();
        $dataProvider = $searchModel->search((Yii::$app->request->queryParams),1);

        if(Yii::$app->request->post('hasEditable')){
           
           // $_id=$_POST['editableKey'];
           // $reporte = $this->findModel($_id);
            $reporteId = Yii::$app->request->post('editableKey');
            $reporte =ReporteFalla::findOne($reporteId);

             $out = Json::encode(['output'=>'', 'message'=>'']);

            $post = [];
            $posted = current($_POST['ReporteFalla']);
            $post['ReporteFalla'] = $posted;

            if ($model->load($post)) {
                $output = '';
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                $model->save();
            }
            echo $out;
            return;
        }

        return $this->render('index', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexradio()
    {
        
        $searchModel = new ReporteFallaSearch();
        $dataProvider = $searchModel->search((Yii::$app->request->queryParams),2);

        if(Yii::$app->request->post('hasEditable')){
           
           // $_id=$_POST['editableKey'];
           // $reporte = $this->findModel($_id);
            $reporteId = Yii::$app->request->post('editableKey');
            $reporte =ReporteFalla::findOne($reporteId);

             $out = Json::encode(['output'=>'', 'message'=>'']);

            $post = [];
            $posted = current($_POST['ReporteFalla']);
            $post['ReporteFalla'] = $posted;

            if ($model->load($post)) {
                $output = '';
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                $model->save();
            }
            echo $out;
            return;
        }

        return $this->render('indexradio', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexenlace()

    {
        
        $searchModel = new ReporteFallaSearch();
        $dataProvider = $searchModel->search((Yii::$app->request->queryParams),3);

        if(Yii::$app->request->post('hasEditable')){
           
           // $_id=$_POST['editableKey'];
           // $reporte = $this->findModel($_id);
            $reporteId = Yii::$app->request->post('editableKey');
            $reporte =ReporteFalla::findOne($reporteId);

             $out = Json::encode(['output'=>'', 'message'=>'']);

            $post = [];
            $posted = current($_POST['ReporteFalla']);
            $post['ReporteFalla'] = $posted;

            if ($model->load($post)) {
                $output = '';
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                $model->save();
            }
            echo $out;
            return;
        }

        return $this->render('indexenlace', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReporteFalla model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewrad($id)
    {
        return $this->render('viewrad', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ReporteFalla model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
        public function actionCreates()
    {
        $name= new Usuario();

        $model = new ReporteFalla();
        $modelsPersonal = [new UsuarioReportef];
         $usuarionew[]='';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

             
                

             $modelsPersonal = Model::createMultiple(UsuarioReportef::classname());
            Model::loadMultiple($modelsPersonal, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPersonal) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        $i=1;
                         foreach ($modelsPersonal as $value) {
                            $usuarionew[]=$value->usuario_idusuario;
                           //  print_r($usuarionew[$i]);  
                             $i++;
                            
                        } 
                        foreach ($modelsPersonal as $modelsPersonal) {
                            $modelsPersonal->reporte_falla_idreporte_falla = $model->idreporte_falla;

                            if (! ($flag =  $modelsPersonal->save(false))) {
                                $transaction->rollBack();
                                 
                                break;
                            }
                        }
                    }
                    if ($flag) {
                       
                        
                         $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                          $fallaname->bindValue(':idf', $model->falla_idfalla);
                          $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC);

                         // \Yii::$app->sms->send(array('to'=>'584266026415', 'message'=>'Hello world!'));
                       

                       for($i=1; $i<=(sizeof($usuarionew)-1); $i++){

                       
                       
                         \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='FALSE' WHERE idusuario=:id")
                         ->bindValue(':id', $usuarionew[$i])
                         ->execute();

                          $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                          $correo->bindValue(':userid', $usuarionew[$i]);
                          $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                         \Yii::$app->mailer->compose()
                          ->setFrom('luis.malpica.18@gmail.com')
                          ->setTo($correofinal)
                          ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                          ->setTextBody('Se presenta: '.$model->descripcion.' y fuistes asiganado a reparar este siniestro')
                          ->send(); 
                         
                       } 
 

                       $transaction->commit();
                       
                   return $this->redirect(['view', 'id' => $model->idreporte_falla]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }



        } else {
          
            return $this->render('creates', [
                'model' => $model,
                'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
            ]);
        }
    }


        public function actionCreaterad()
    {
        $name= new Usuario();

        $model = new ReporteFalla();
        $model->fecha_inicio = date('Y-m-d');
        $modelsPersonal = [new UsuarioReportef];
         $usuarionew[]='';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

             
                

             $modelsPersonal = Model::createMultiple(UsuarioReportef::classname());
            Model::loadMultiple($modelsPersonal, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPersonal) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        $i=1;
                         foreach ($modelsPersonal as $value) {
                            $usuarionew[]=$value->usuario_idusuario;
                           //  print_r($usuarionew[$i]);  
                             $i++;
                            
                        } 
                        foreach ($modelsPersonal as $modelsPersonal) {
                            $modelsPersonal->reporte_falla_idreporte_falla = $model->idreporte_falla;

                            if (! ($flag =  $modelsPersonal->save(false))) {
                                $transaction->rollBack();
                                 
                                break;
                            }
                        }
                    }
                    if ($flag) {
                       
                        
                         $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                          $fallaname->bindValue(':idf', $model->falla_idfalla);
                          $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC);

                         // \Yii::$app->sms->send(array('to'=>'584266026415', 'message'=>'Hello world!'));
                       

                       for($i=1; $i<=(sizeof($usuarionew)-1); $i++){

                       
                       
                         \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='FALSE' WHERE idusuario=:id")
                         ->bindValue(':id', $usuarionew[$i])
                         ->execute();

                          $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                          $correo->bindValue(':userid', $usuarionew[$i]);
                          $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                         \Yii::$app->mailer->compose()
                          ->setFrom('luis.malpica.18@gmail.com')
                          ->setTo($correofinal)
                          ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                          ->setTextBody('Se presenta: '.$model->descripcion.' y fuistes asiganado a reparar este siniestro')
                          ->send(); 
                         
                       } 
 

                       $transaction->commit();
                       
                   return $this->redirect(['view', 'id' => $model->idreporte_falla]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }



        } else {
          
            return $this->render('createrad', [
                'model' => $model,
                'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
            ]);
        }
    }


    public function actionCreate()
    {
        $name= new Usuario();

        $model = new ReporteFalla();
        $modelsPersonal = [new UsuarioReportef];
         $usuarionew[]='';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

             
                

             $modelsPersonal = Model::createMultiple(UsuarioReportef::classname());
            Model::loadMultiple($modelsPersonal, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPersonal) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        $i=1;
                         foreach ($modelsPersonal as $value) {
                            $usuarionew[]=$value->usuario_idusuario;
                           //  print_r($usuarionew[$i]);  
                             $i++;
                            
                        } 
                        foreach ($modelsPersonal as $modelsPersonal) {
                            $modelsPersonal->reporte_falla_idreporte_falla = $model->idreporte_falla;

                            if (! ($flag =  $modelsPersonal->save(false))) {
                                $transaction->rollBack();
                                 
                                break;
                            }
                        }
                    }
                    if ($flag) {
                       
                        
                         $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                          $fallaname->bindValue(':idf', $model->falla_idfalla);
                          $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC);

                         // \Yii::$app->sms->send(array('to'=>'584266026415', 'message'=>'Hello world!'));
                       

                       for($i=1; $i<=(sizeof($usuarionew)-1); $i++){

                       
                       
                         \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='FALSE' WHERE idusuario=:id")
                         ->bindValue(':id', $usuarionew[$i])
                         ->execute();

                          $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                          $correo->bindValue(':userid', $usuarionew[$i]);
                          $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                         \Yii::$app->mailer->compose()
                          ->setFrom('luis.malpica.18@gmail.com')
                          ->setTo($correofinal)
                          ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                          ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                          ->send(); 
                         
                       } 
 

                       $transaction->commit();
                       
                   return $this->redirect(['view', 'id' => $model->idreporte_falla]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }



        } else {
          
            return $this->render('create', [
                'model' => $model,
                'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
            ]);
        }
    }

    /**
     * Updates an existing ReporteFalla model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsPersonal = $model->usuarioReportefs;
        $band=0;
        $viejo[]='';
        $nuevo[]='';
        $nuevomas[]='';        
       $cont=0;
        $con=0;
        $final=0;

        if ($model->load(Yii::$app->request->post())) {
            
            $con=0;
             $usuario[]='';
              $usuar[]='';
                 foreach ($modelsPersonal as $value) {
                  $usuario[]=$value->usuario_idusuario;
                  $con++;
                            
                 }  
        //print_r($con); 

            $oldIDs = ArrayHelper::map($modelsPersonal, 'reporte_falla_idreporte_falla', 'reporte_falla_idreporte_falla');
            $modelsPersonal = Model::createMultiple(UsuarioReportef::classname(), $modelsPersonal);
            Model::loadMultiple($modelsPersonal, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPersonal, 'reporte_falla_idreporte_falla', 'usuario_idusuario')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPersonal) && $valid;


            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        
                        if (! empty($deletedIDs)) {
                            $band=2;
                            UsuarioReportef::deleteAll(['reporte_falla_idreporte_falla' => $deletedIDs]);
                             
                        }
                         $usuar[]='';
                         $cont=0;
                         foreach ($modelsPersonal as $value) {
                             $usuar[]=$value->usuario_idusuario;
                             $cont++;
                                         
                          }
                         
                        if($con==$cont)
                        {
                            $j=1;
                            $i=1;
                             foreach ($modelsPersonal as $value) {

                                if($usuar[$i+1]!=$usuario[$i]){
                                  
                                  $viejo[$j]=$usuario[$i];
                                  $nuevo[$j]=$usuar[$i+1];
                                  $final++;
                                  $j++;
                                  
                                }
                              $i++;  

                                         
                          }


                        }elseif ($con!=$cont) {
                           

                                $j=1;
                                $i=1;
                               for($i=1; $i<($con+1); $i++) {

                                if($usuar[$i+1]!=$usuario[$i]){

                                  $viejo[$j]=$usuario[$i];
                                  $nuevomas[$j]=$usuar[$i+1];
                            
                                  $final++;
                                  $j++;
                                  
                                } 

                                         
                             }
                             
                                for($i=1; $i<(($cont-$con)+1); $i++) {


                                  $nuevomas[$j]=$usuar[($cont-1)+$i];                          
                                  $j++;
                                  
                                }
                               

                        }  
                        foreach ($modelsPersonal as $modelsPersonal) {
                             $modelsPersonal->reporte_falla_idreporte_falla = $model->idreporte_falla;
                            
                             
                            if (!($flag = $modelsPersonal->save(false))) {
                              
                                $transaction->rollBack();
                                break;
                            }
                        }
                       
                    }
                      
                        
                    if ($flag) {
                       
                           $c=count($nuevo);
                           $c2=count($nuevomas);

                                               
                            $i=1;  
                            for($i=1; $i<($final+1); $i++){ 
                                  //print_r($viejo[$i]); 

                             \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='TRUE' WHERE idusuario=:id")
                             ->bindValue(':id', $viejo[$i])
                             ->execute();
                             } 

                             $i=2;  
                            for($i=2; $i<($cont+2); $i++){   

                                //print_r($usuar[$i]); 
                             \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='FALSE' WHERE idusuario=:id")
                             ->bindValue(':id', $usuar[$i])
                             ->execute();
                        
                             } 

                             if($c==1 && $c2>1)
                             {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c2; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevomas[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }
                                

                             }elseif ($c>1 && $c2>1) {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevo[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }


                                for ($i=1; $i < $c2; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevomas[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }

                             }elseif ($c>1 && $c2==1) {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevo[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }
                             }

                           $transaction->commit();
                            

                        
                      return $this->redirect(['view', 'id' => $model->idreporte_falla]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

           
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
            ]);
        }
    }
     public function actionUpdaterad($id)
    {








        $model = $this->findModel($id);
        $modelsPersonal = $model->usuarioReportefs;
        $band=0;
        $viejo[]='';
        $nuevo[]='';
        $nuevomas[]='';        
       $cont=0;
        $con=0;
        $final=0;
        $ya=0;

        if ($model->load(Yii::$app->request->post())) {
            
            $con=0;
             $usuario[]='';
              $usuar[]='';
                 foreach ($modelsPersonal as $value) {
                  $usuario[]=$value->usuario_idusuario;
                  $con++;
                            
                 }  
        //print_r($con); 

            $oldIDs = ArrayHelper::map($modelsPersonal, 'reporte_falla_idreporte_falla', 'reporte_falla_idreporte_falla');
            $modelsPersonal = Model::createMultiple(UsuarioReportef::classname(), $modelsPersonal);
            Model::loadMultiple($modelsPersonal, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPersonal, 'reporte_falla_idreporte_falla', 'usuario_idusuario')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPersonal) && $valid;


            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        
                        if (! empty($deletedIDs)) {
                            $band=2;
                            UsuarioReportef::deleteAll(['reporte_falla_idreporte_falla' => $deletedIDs]);
                             
                        }

                         if(strcmp($model->estatus , "Resuelto")==0)
                         {
                             $primera = date('d/m/Y');
                             $segunda = "31/01/2000";
                             $ya = compararFechas ($primera,$segunda);
                             echo $ya;
                         }
                         $usuar[]='';
                         $cont=0;
                         foreach ($modelsPersonal as $value) {
                             $usuar[]=$value->usuario_idusuario;
                             $cont++;
                                         
                          }
                         
                        if($con==$cont)
                        {
                            $j=1;
                            $i=1;
                             foreach ($modelsPersonal as $value) {

                                if($usuar[$i+1]!=$usuario[$i]){
                                  
                                  $viejo[$j]=$usuario[$i];
                                  $nuevo[$j]=$usuar[$i+1];
                                  $final++;
                                  $j++;
                                  
                                }
                              $i++;  

                                         
                          }


                        }elseif ($con!=$cont) {
                           

                                $j=1;
                                $i=1;
                               for($i=1; $i<($con+1); $i++) {

                                if($usuar[$i+1]!=$usuario[$i]){

                                  $viejo[$j]=$usuario[$i];
                                  $nuevomas[$j]=$usuar[$i+1];
                            
                                  $final++;
                                  $j++;
                                  
                                } 

                                         
                             }
                             
                                for($i=1; $i<(($cont-$con)+1); $i++) {


                                  $nuevomas[$j]=$usuar[($cont-1)+$i];                          
                                  $j++;
                                  
                                }
                               

                        }  
                        foreach ($modelsPersonal as $modelsPersonal) {
                             $modelsPersonal->reporte_falla_idreporte_falla = $model->idreporte_falla;
                            
                             
                            if (!($flag = $modelsPersonal->save(false))) {
                              
                                $transaction->rollBack();
                                break;
                            }
                        }
                       
                    }
                   
                      
                        
                    if ($flag) {
                       
                           $c=count($nuevo);
                           $c2=count($nuevomas);

                                               
                            $i=1;  
                            for($i=1; $i<($final+1); $i++){ 
                                  //print_r($viejo[$i]); 

                             \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='TRUE' WHERE idusuario=:id")
                             ->bindValue(':id', $viejo[$i])
                             ->execute();
                             } 

                             $i=2;  
                            for($i=2; $i<($cont+2); $i++){   

                                //print_r($usuar[$i]); 
                             \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='FALSE' WHERE idusuario=:id")
                             ->bindValue(':id', $usuar[$i])
                             ->execute();
                        
                             } 

                             if($c==1 && $c2>1)
                             {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c2; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevomas[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }
                                

                             }elseif ($c>1 && $c2>1) {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevo[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }


                                for ($i=1; $i < $c2; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevomas[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }

                             }elseif ($c>1 && $c2==1) {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevo[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }
                             }

                           $transaction->commit();
                            

                        
                     // return $this->redirect(['view', 'id' => $model->idreporte_falla]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

           
        } else {
          //  return $this->render('updaterad', [
           //     'model' => $model,
           //     'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
          //  ]);
        }
    }
     public function actionUpdates($id)
    {
        $model = $this->findModel($id);
        $modelsPersonal = $model->usuarioReportefs;
        $band=0;
        $viejo[]='';
        $nuevo[]='';
        $nuevomas[]='';        
       $cont=0;
        $con=0;
        $final=0;

        if ($model->load(Yii::$app->request->post())) {
            
            $con=0;
             $usuario[]='';
              $usuar[]='';
                 foreach ($modelsPersonal as $value) {
                  $usuario[]=$value->usuario_idusuario;
                  $con++;
                            
                 }  
        //print_r($con); 

            $oldIDs = ArrayHelper::map($modelsPersonal, 'reporte_falla_idreporte_falla', 'reporte_falla_idreporte_falla');
            $modelsPersonal = Model::createMultiple(UsuarioReportef::classname(), $modelsPersonal);
            Model::loadMultiple($modelsPersonal, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPersonal, 'reporte_falla_idreporte_falla', 'usuario_idusuario')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPersonal) && $valid;


            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        
                        if (! empty($deletedIDs)) {
                            $band=2;
                            UsuarioReportef::deleteAll(['reporte_falla_idreporte_falla' => $deletedIDs]);
                             
                        }
                         $usuar[]='';
                         $cont=0;
                         foreach ($modelsPersonal as $value) {
                             $usuar[]=$value->usuario_idusuario;
                             $cont++;
                                         
                          }
                         
                        if($con==$cont)
                        {
                            $j=1;
                            $i=1;
                             foreach ($modelsPersonal as $value) {

                                if($usuar[$i+1]!=$usuario[$i]){
                                  
                                  $viejo[$j]=$usuario[$i];
                                  $nuevo[$j]=$usuar[$i+1];
                                  $final++;
                                  $j++;
                                  
                                }
                              $i++;  

                                         
                          }


                        }elseif ($con!=$cont) {
                           

                                $j=1;
                                $i=1;
                               for($i=1; $i<($con+1); $i++) {

                                if($usuar[$i+1]!=$usuario[$i]){

                                  $viejo[$j]=$usuario[$i];
                                  $nuevomas[$j]=$usuar[$i+1];
                            
                                  $final++;
                                  $j++;
                                  
                                } 

                                         
                             }
                             
                                for($i=1; $i<(($cont-$con)+1); $i++) {


                                  $nuevomas[$j]=$usuar[($cont-1)+$i];                          
                                  $j++;
                                  
                                }
                               

                        }  
                        foreach ($modelsPersonal as $modelsPersonal) {
                             $modelsPersonal->reporte_falla_idreporte_falla = $model->idreporte_falla;
                            
                             
                            if (!($flag = $modelsPersonal->save(false))) {
                              
                                $transaction->rollBack();
                                break;
                            }
                        }
                       
                    }
                      
                        
                    if ($flag) {
                       
                           $c=count($nuevo);
                           $c2=count($nuevomas);

                                               
                            $i=1;  
                            for($i=1; $i<($final+1); $i++){ 
                                  //print_r($viejo[$i]); 

                             \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='TRUE' WHERE idusuario=:id")
                             ->bindValue(':id', $viejo[$i])
                             ->execute();
                             } 

                             $i=2;  
                            for($i=2; $i<($cont+2); $i++){   

                                //print_r($usuar[$i]); 
                             \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='FALSE' WHERE idusuario=:id")
                             ->bindValue(':id', $usuar[$i])
                             ->execute();
                        
                             } 

                             if($c==1 && $c2>1)
                             {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c2; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevomas[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }
                                

                             }elseif ($c>1 && $c2>1) {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevo[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }


                                for ($i=1; $i < $c2; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevomas[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }

                             }elseif ($c>1 && $c2==1) {

                                $fallaname = \Yii::$app->db->createCommand("SELECT nombre,tipo FROM falla WHERE idfalla=:idf");
                                $fallaname->bindValue(':idf', $model->falla_idfalla);
                                $falla = $fallaname->queryOne(\PDO::FETCH_ASSOC); 

                                for ($i=1; $i < $c; $i++) { 

                                 $correo = \Yii::$app->db->createCommand("SELECT correo FROM usuario WHERE idusuario=:userid");
                                 $correo->bindValue(':userid', $nuevo[$i]);
                                 $correofinal = $correo->queryOne(\PDO::FETCH_COLUMN);

                         
                                \Yii::$app->mailer->compose()
                                    ->setFrom('luis.malpica.18@gmail.com')
                                    ->setTo($correofinal)
                                    ->setSubject('Falla de tipo '.$falla['tipo']. ' con índole '.$falla['nombre'].' ')
                                    ->setTextBody('Se presenta: '.$model->descripcion.' con un punto de referencia de '.$model->ptos_referencia.' y fuistes asiganado a reparar este siniestro')
                                    ->send(); 
                                }
                             }

                           $transaction->commit();
                            

                        
                      return $this->redirect(['view', 'id' => $model->idreporte_falla]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

           
        } else {
            return $this->render('updates', [
                'model' => $model,
                'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
            ]);
        }
    }
  

    /**
     * Deletes an existing ReporteFalla model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       


        $report=UsuarioReportef::find()->where(['=', 'reporte_falla_idreporte_falla', $id])->all();
        $c=count($report);
        
        $ids[]='';

        foreach ($report as $value) {
            $ids[]=$value->usuario_idusuario;
        }

        for ($i=1; $i < ($c+1); $i++) { 

            $person=UsuarioReportef::findOne(['usuario_idusuario'=>$ids[$i]]);
            $person->delete();
              $transaction = \Yii::$app->db->beginTransaction();

                        \Yii::$app->db->createCommand("UPDATE usuario SET disponibilidad='TRUE' WHERE idusuario=:id")
                        ->bindValue(':id', $ids[$i])
                        ->execute();

         $transaction->commit();

        }

        $this->findModel($id)->delete();
        echo Json::encode(['envio'=>'ok']);
        return $this->redirect(['index']);

    }

    public function actionLista($id)
    {
        $countPosts = FibraOptica::find()
                ->where(['estacion_idestacion' => $id])
                ->count();
 
        $posts = FibraOptica::find()
                ->where(['estacion_idestacion' => $id])
                ->all();
 
        if($countPosts>0){
            echo "<option>Seleccione enlace de fibra</option>";
            foreach($posts as $post){

                echo "<option value='".$post->idfibra_optica."'>".$post->nombre."</option>";
            }
        }
        else{
            echo "<option>Seleccione enlace de fibra</option>";
        }
 
    }
    public function actionListarad($id)
    {
        $countPosts = Radio::find()
                ->where(['estacion_idestacion' => $id])
                ->count();
 
        $posts = Radio::find()
                ->where(['estacion_idestacion' => $id])
                ->all();
 
        if($countPosts>0){
            echo "<option>Seleccione radio</option>";
            foreach($posts as $post){

                echo "<option value='".$post->idradio."'>".$post->serial."</option>";
            }
        }
        else{
            echo "<option>Seleccione radio</option>";
        }
 
    }
        public function actionListaes($id)
    {
        $countPosts = EnlaceSatelital::find()
                ->where(['estacion_idestacion' => $id])
                ->count();
 
        $posts = EnlaceSatelital::find()
                ->where(['estacion_idestacion' => $id])
                ->all();
 
        if($countPosts>0){
            echo "<option>Seleccione código enlace</option>";
            foreach($posts as $post){

                echo "<option value='".$post->idenlace_satelital."'>".$post->codigo."</option>";
            }
        }
        else{
            echo "<option>Seleccione código enlace</option>";
        }
 
    }
     public function compararFechas($primera, $segunda)
        {
             $valoresPrimera = explode ("/", $primera);   
             $valoresSegunda = explode ("/", $segunda); 
             $diaPrimera    = $valoresPrimera[0];  
             $mesPrimera  = $valoresPrimera[1];  
             $anyoPrimera   = $valoresPrimera[2]; 
             $diaSegunda   = $valoresSegunda[0];  
             $mesSegunda = $valoresSegunda[1];  
             $anyoSegunda  = $valoresSegunda[2];
             $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
             $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
            if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
             // "La fecha ".$primera." no es válida";
            return 0;
            }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
                  // "La fecha ".$segunda." no es válida";
                  return 0;
            }else{
             return  $diasPrimeraJuliano - $diasSegundaJuliano;
            } 
        }


    /**
     * Finds the ReporteFalla model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReporteFalla the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReporteFalla::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     protected function findUsuario($id)
    {

        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
