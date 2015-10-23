<?php

namespace app\controllers;

use Yii;
use app\models\Inspeccion;
use app\models\InspeccionSearch;
use app\models\EstadoItemIsnpeccion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use app\models\Address;
use app\models\EntryForm;


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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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

    /**
     * Creates a new Inspeccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inspeccion();
        $modelsEstadoItemIns = [new EstadoItemIsnpeccion];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {



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




        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsEstadoItemIns' => (empty($modelsEstadoItemIns)) ? [new EstadoItemIsnpeccion] : $modelsEstadoItemIns
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
        $modelsEstadoItemIns = $model->idinspeccion;


         if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsEstadoItemIns, 'id', 'id');
            $modelsEstadoItemIns = Model::createMultiple(EstadoItemIsnpeccion::classname(), $modelsEstadoItemIns);
            Model::loadMultiple($modelsEstadoItemIns, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsEstadoItemIns, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsEstadoItemIns),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEstadoItemIns) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            EstadoItemIsnpeccion::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsEstadoItemIns as $modelsEstadoItemIns) {
                            $modelsEstadoItemIns->inspeccion_idinspeccion = $model->idinspeccion;

                            if (! ($flag = $modelAddress->save(false))) {
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
                'modelsEstadoI' => (empty($modelsEstadoI)) ? [new EstadoItemIsnpeccion] : $modelsEstadoI
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
