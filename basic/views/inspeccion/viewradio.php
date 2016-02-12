<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Multimedia;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Inspeccion */

$this->title = $model->idinspeccion;
$this->params['breadcrumbs'][] = ['label' => 'Inspeccions', 'url' => ['indexradios']];
$this->params['breadcrumbs'][] = $this->title;

$Archivo = new Multimedia();
?>
<div class="inspeccion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idinspeccion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idinspeccion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idinspeccion',
            'radio_idradio',
            'estacion_idestacion',
            'descripcion',
            'ptos_referencia',
            'fecha_asig',
            'fecha_insp',
            'estatus',
            'radio_idradio',
            
        ]
    ]) ?>

  <?php
  
  $a =  ArrayHelper::map(Multimedia::find()->where(['=', 'inspeccion_idinspeccion', $model->idinspeccion])->all(),'idmultimedia','multimedia');
  


  foreach ($a as  $value) {
     //print_r($value);
     print_r( "<center><a href='uploads/".$model->radioIdradio->nombre.'-'.$model->idinspeccion.'/'.$value."'><img style=\"width:30%\" src='uploads/".$model->radioIdradio->nombre.'-'.$model->idinspeccion.'/'.$value."' class=\"img-responsive\"></a></center>");


  }
  
   
 
  
  
   

        
   
    
   
   ?>   

</div>
