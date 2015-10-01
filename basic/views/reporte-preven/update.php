<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportePreven */

$this->title = 'Update Reporte Preven: ' . ' ' . $model->idreporte_preven;
$this->params['breadcrumbs'][] = ['label' => 'Reporte Prevens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idreporte_preven, 'url' => ['view', 'id' => $model->idreporte_preven]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reporte-preven-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
