<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VehiculoReportef */

$this->title = 'Create Vehiculo Reportef';
$this->params['breadcrumbs'][] = ['label' => 'Vehiculo Reportefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-reportef-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
