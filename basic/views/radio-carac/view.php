<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RadioCarac */

$this->title = $model->caracteristicasrad_idcaracteristicas;
$this->params['breadcrumbs'][] = ['label' => 'Radio Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-carac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'caracteristicasrad_idcaracteristicas' => $model->caracteristicasrad_idcaracteristicas, 'radio_idradio' => $model->radio_idradio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'caracteristicasrad_idcaracteristicas' => $model->caracteristicasrad_idcaracteristicas, 'radio_idradio' => $model->radio_idradio], [
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
            'caracteristicasrad_idcaracteristicas',
            'radio_idradio',
            'valor',
        ],
    ]) ?>

</div>
