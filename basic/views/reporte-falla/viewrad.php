<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReporteFalla */

$this->title = $model->idreporte_falla;
$this->params['breadcrumbs'][] = ['label' => 'Reporte Fallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-falla-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idreporte_falla], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idreporte_falla], [
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
            'idreporte_falla',
            'falla_idfalla',
            'descripcion',
            'ptos_referencia',
            'fecha_inicio',
            'fecha_fin',
            'estatus',
            'distancia',
            'urgencia',
        ],
    ]) ?>

</div>