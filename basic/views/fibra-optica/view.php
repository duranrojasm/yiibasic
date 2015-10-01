<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOptica */

$this->title = $model->idfibra_optica;
$this->params['breadcrumbs'][] = ['label' => 'Fibra Opticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idfibra_optica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idfibra_optica], [
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
            'idfibra_optica',
            'nodo_idnodo',
            'estacion_idestacion',
            'nombre',
            'distancia',
            'observacion',
            'periodo_mantenimiento',
            'estacion_idestaciondos',
            'nodo_idnododos',
        ],
    ]) ?>

</div>
