<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelital */

$this->title = $model->idenlace_satelital;
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelitals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idenlace_satelital], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idenlace_satelital], [
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
            'idenlace_satelital',
            'torre_idtorre',
            'cliente_idcliente',
            'estacion_idestacion',
            'codigo',
            'nombre',
            'num_antena',
            'periodo_mantenimiento',
            'estatus',
            'ubicacion_disp',
            'estacion_idestaciondos',
        ],
    ]) ?>

</div>
