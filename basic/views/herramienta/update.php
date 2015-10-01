<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Herramienta */

$this->title = 'Update Herramienta: ' . ' ' . $model->idherramienta;
$this->params['breadcrumbs'][] = ['label' => 'Herramientas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idherramienta, 'url' => ['view', 'id' => $model->idherramienta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="herramienta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
