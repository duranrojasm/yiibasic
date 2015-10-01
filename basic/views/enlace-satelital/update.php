<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelital */

$this->title = 'Update Enlace Satelital: ' . ' ' . $model->idenlace_satelital;
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelitals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idenlace_satelital, 'url' => ['view', 'id' => $model->idenlace_satelital]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enlace-satelital-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
