<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstructurEq */

$this->title = $model->idestructur_eq;
$this->params['breadcrumbs'][] = ['label' => 'Estructur Eqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructur-eq-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idestructur_eq], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idestructur_eq], [
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
            'idestructur_eq',
            'radio_idradio',
            'estructura_idestructura',
            'fecha',
            'observacion',
        ],
    ]) ?>

</div>
