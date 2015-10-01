<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalCarac */

$this->title = $model->idenlace_satelital_carac;
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelital Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-carac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idenlace_satelital_carac], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idenlace_satelital_carac], [
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
            'idenlace_satelital_carac',
            'caracteristica_es_idcaracteristica',
            'enlace_satelital_idenlace_satelital',
            'valor',
        ],
    ]) ?>

</div>
