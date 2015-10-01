<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalCarac */

$this->title = 'Update Enlace Satelital Carac: ' . ' ' . $model->idenlace_satelital_carac;
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelital Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idenlace_satelital_carac, 'url' => ['view', 'id' => $model->idenlace_satelital_carac]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enlace-satelital-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
