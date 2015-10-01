<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoPreventivo */

$this->title = 'Update Mantenimiento Preventivo: ' . ' ' . $model->idmantenimiento_preventivo;
$this->params['breadcrumbs'][] = ['label' => 'Mantenimiento Preventivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmantenimiento_preventivo, 'url' => ['view', 'id' => $model->idmantenimiento_preventivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mantenimiento-preventivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
