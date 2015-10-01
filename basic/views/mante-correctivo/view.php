<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ManteCorrectivo */

$this->title = $model->idmante_correctivo;
$this->params['breadcrumbs'][] = ['label' => 'Mante Correctivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mante-correctivo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idmante_correctivo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idmante_correctivo], [
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
            'idmante_correctivo',
            'reporte_falla_idreporte_falla',
            'equipo_general_idequipo_general',
            'enlace_satelital_idenlace_satelital',
            'radio_idradio',
            'fibra_optica_idfibra_optica',
        ],
    ]) ?>

</div>
