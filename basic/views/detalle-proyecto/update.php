<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyecto */

$this->title = 'Update Detalle Proyecto: ' . ' ' . $model->iddetalle_proyecto;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetalle_proyecto, 'url' => ['view', 'id' => $model->iddetalle_proyecto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
