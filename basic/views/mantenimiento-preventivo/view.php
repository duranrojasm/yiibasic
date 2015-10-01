<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoPreventivo */

$this->title = $model->idmantenimiento_preventivo;
$this->params['breadcrumbs'][] = ['label' => 'Mantenimiento Preventivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-preventivo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idmantenimiento_preventivo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idmantenimiento_preventivo], [
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
            'idmantenimiento_preventivo',
            'fibra_optica_idfibra_optica',
            'equipo_general_idequipo_general',
            'enlace_satelital_idenlace_satelital',
            'radio_idradio',
            'reporte_preven_idreporte_preven',
        ],
    ]) ?>

</div>
