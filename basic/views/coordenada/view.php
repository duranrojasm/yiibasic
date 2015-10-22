<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Coordenada */

$this->title = $model->idcoordenada;
$this->params['breadcrumbs'][] = ['label' => 'Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordenada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idcoordenada], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idcoordenada], [
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
            'idcoordenada',
            'latitud',
            'longitud',
            'asnm',
            'reportefalla',
            'estacion',
            'nodo',
        ],
    ]) ?>

</div>
