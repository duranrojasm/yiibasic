<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculoReportef */

$this->title = 'Update Vehiculo Reportef: ' . ' ' . $model->vehiculo_idvehiculo;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculo Reportefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehiculo_idvehiculo, 'url' => ['view', 'vehiculo_idvehiculo' => $model->vehiculo_idvehiculo, 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehiculo-reportef-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
