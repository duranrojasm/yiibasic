<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculoReportef */

$this->title = $model->vehiculo_idvehiculo;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculo Reportefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-reportef-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'vehiculo_idvehiculo' => $model->vehiculo_idvehiculo, 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'vehiculo_idvehiculo' => $model->vehiculo_idvehiculo, 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla], [
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
            'vehiculo_idvehiculo',
            'reporte_falla_idreporte_falla',
        ],
    ]) ?>

</div>
