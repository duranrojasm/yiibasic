<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inspeccion */

$this->title = 'Update Inspeccion: ' . ' ' . $model->idinspeccion;
$this->params['breadcrumbs'][] = ['label' => 'Inspeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinspeccion, 'url' => ['view', 'id' => $model->idinspeccion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspeccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formnodo', [
        'model' => $model,
        'modelsEstadoItemIns'=> $modelsEstadoItemIns,
    ]) ?>

</div>
