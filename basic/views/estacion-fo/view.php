<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstacionFo */

$this->title = $model->idestacion_fo;
$this->params['breadcrumbs'][] = ['label' => 'Estacion Fos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estacion-fo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idestacion_fo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idestacion_fo], [
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
            'idestacion_fo',
            'nodo_idnodo',
            'fibra_optica_idfibra_optica',
            'estacion_idestacion',
        ],
    ]) ?>

</div>
