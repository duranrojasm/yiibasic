<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PartesEs */

$this->title = $model->idpartes_es;
$this->params['breadcrumbs'][] = ['label' => 'Partes Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partes-es-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idpartes_es], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idpartes_es], [
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
            'idpartes_es',
            'enlace_satelital_idenlace_satelital',
            'nombre',
            'serial',
        ],
    ]) ?>

</div>
