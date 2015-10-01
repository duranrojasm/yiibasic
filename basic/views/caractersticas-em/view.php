<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CaractersticasEm */

$this->title = $model->idcaractersticas_em;
$this->params['breadcrumbs'][] = ['label' => 'Caractersticas Ems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caractersticas-em-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idcaractersticas_em], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idcaractersticas_em], [
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
            'idcaractersticas_em',
            'nombre',
            'tipo',
        ],
    ]) ?>

</div>
