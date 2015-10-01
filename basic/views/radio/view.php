<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Radio */

$this->title = $model->idradio;
$this->params['breadcrumbs'][] = ['label' => 'Radios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idradio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idradio], [
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
            'idradio',
            'modelo_idmodelo',
            'estacion_idestacion',
            'observaciones',
            'posicion_fisica',
            'nombre',
            'marca',
            'serial',
            'periodo_mantenimiento',
            'estatus',
            'ubicacion_disp',
            'estacion_idestaciondos',
        ],
    ]) ?>

</div>
