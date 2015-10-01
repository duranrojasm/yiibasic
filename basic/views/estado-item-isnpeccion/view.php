<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccion */

$this->title = $model->idestado_item_isnpeccion;
$this->params['breadcrumbs'][] = ['label' => 'Estado Item Isnpeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-item-isnpeccion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idestado_item_isnpeccion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idestado_item_isnpeccion], [
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
            'idestado_item_isnpeccion',
            'inspeccion_idinspeccion',
            'item_iditem',
            'fecha',
            'descrip_novedades',
            'estado_items',
            'valor_potencia_volt',
        ],
    ]) ?>

</div>
