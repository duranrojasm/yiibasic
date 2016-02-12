<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hilo */

$this->title = $model->idhilo;
$this->params['breadcrumbs'][] = ['label' => 'Hilos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hilo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idhilo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idhilo], [
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
            'idhilo',
            'fibra_idfibra_optica',
            'numhilo',
            'ttodest',
            'ab',
            'sist',
            'band',
            'odf',
            'observ',
            'des_esp',
        ],
    ]) ?>

</div>
