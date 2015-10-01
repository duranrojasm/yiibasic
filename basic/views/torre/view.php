<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Torre */

$this->title = $model->idtorre;
$this->params['breadcrumbs'][] = ['label' => 'Torres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idtorre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idtorre], [
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
            'idtorre',
            'codigo',
            'altura',
            'tipo',
        ],
    ]) ?>

</div>
