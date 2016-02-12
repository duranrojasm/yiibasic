<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hilo */

$this->title = 'Update Hilo: ' . ' ' . $model->idhilo;
$this->params['breadcrumbs'][] = ['label' => 'Hilos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idhilo, 'url' => ['view', 'id' => $model->idhilo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hilo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
