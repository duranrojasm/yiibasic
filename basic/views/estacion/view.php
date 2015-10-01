<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estacion */

$this->title = $model->idestacion;
$this->params['breadcrumbs'][] = ['label' => 'Estacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idestacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idestacion], [
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
            'idestacion',
            'coordenada_idcoordenada',
            'localidad_idlocalidad',
            'codigo',
            'nombre',
            'tipo_central',
            'telefono',
            'direccion',
            'distancia',
            'tiempo',
        ],
    ]) ?>

</div>
