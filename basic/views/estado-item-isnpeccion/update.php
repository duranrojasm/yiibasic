<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccion */

$this->title = 'Update Estado Item Isnpeccion: ' . ' ' . $model->idestado_item_isnpeccion;
$this->params['breadcrumbs'][] = ['label' => 'Estado Item Isnpeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestado_item_isnpeccion, 'url' => ['view', 'id' => $model->idestado_item_isnpeccion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-item-isnpeccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
