<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccion */

$this->title = 'Update Estado Item Isnpeccion: ' . ' ' . $model->inspeccion_idinspeccion;
$this->params['breadcrumbs'][] = ['label' => 'Estado Item Isnpeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inspeccion_idinspeccion, 'url' => ['view', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'item_iditem' => $model->item_iditem]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-item-isnpeccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
