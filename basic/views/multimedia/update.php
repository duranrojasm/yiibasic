<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Multimedia */

$this->title = 'Update Multimedia: ' . ' ' . $model->idmultimedia;
$this->params['breadcrumbs'][] = ['label' => 'Multimedia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmultimedia, 'url' => ['view', 'id' => $model->idmultimedia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="multimedia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
