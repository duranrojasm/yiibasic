<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReporteFalla */

$this->title = 'Update Reporte Falla: ' . ' ' . $model->idreporte_falla;
$this->params['breadcrumbs'][] = ['label' => 'Reporte Fallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idreporte_falla, 'url' => ['view', 'id' => $model->idreporte_falla]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reporte-falla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdaterad', [
        'model' => $model,
        'modelsPersonal' => (empty($modelsPersonal)) ? [new UsuarioReportef] : $modelsPersonal
    ]) ?>

</div>