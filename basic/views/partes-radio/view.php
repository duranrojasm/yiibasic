<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PartesRadio */

$this->title = $model->idpartes_radio;
$this->params['breadcrumbs'][] = ['label' => 'Partes Radios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partes-radio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idpartes_radio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idpartes_radio], [
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
            'idpartes_radio',
            'radio_idradio',
            'codigo',
            'nombre',
            'capacidad',
        ],
    ]) ?>

</div>
