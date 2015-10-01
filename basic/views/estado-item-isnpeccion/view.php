<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccion */

$this->title = $model->inspeccion_idinspeccion;
$this->params['breadcrumbs'][] = ['label' => 'Estado Item Isnpeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-item-isnpeccion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'item_iditem' => $model->item_iditem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'item_iditem' => $model->item_iditem], [
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
            'inspeccion_idinspeccion',
            'item_iditem',
            'fecha',
            'descrip_novedades',
            'estado_items',
            'valor_potencia_volt',
        ],
    ]) ?>

</div>
