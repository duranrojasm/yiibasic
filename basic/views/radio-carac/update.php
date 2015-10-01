<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RadioCarac */

$this->title = 'Update Radio Carac: ' . ' ' . $model->idradio_carac;
$this->params['breadcrumbs'][] = ['label' => 'Radio Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idradio_carac, 'url' => ['view', 'id' => $model->idradio_carac]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="radio-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
