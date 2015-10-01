<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Torre */

$this->title = 'Update Torre: ' . ' ' . $model->idtorre;
$this->params['breadcrumbs'][] = ['label' => 'Torres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtorre, 'url' => ['view', 'id' => $model->idtorre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="torre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
