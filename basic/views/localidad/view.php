<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Localidad */

$this->title = $model->idlocalidad;
$this->params['breadcrumbs'][] = ['label' => 'Localidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idlocalidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idlocalidad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
                'model'=>$model,
                'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                'heading'=>'Localidad ' . $model->nombre,
                'type'=>DetailView::TYPE_INFO,
                ],
                'attributes'=>[
                 'nombre',
                  'tipo',
                  
                  ]
                
            ]); ?>

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idlocalidad',
            'localidad_idlocalidad',
            'nombre',
            'tipo',
        ],
    ]) ?> -->

</div>
