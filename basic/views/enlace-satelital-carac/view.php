<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalCarac */

$this->title = $model->caracteristica_es_idcaracteristica;
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelital Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-carac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'caracteristica_es_idcaracteristica' => $model->caracteristica_es_idcaracteristica, 'enlace_satelital_idenlace_satelital' => $model->enlace_satelital_idenlace_satelital], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'caracteristica_es_idcaracteristica' => $model->caracteristica_es_idcaracteristica, 'enlace_satelital_idenlace_satelital' => $model->enlace_satelital_idenlace_satelital], [
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
            'caracteristica_es_idcaracteristica',
            'enlace_satelital_idenlace_satelital',
            'valor',
        ],
    ]) ?>

</div>
