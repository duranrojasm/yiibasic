<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PartesRadio */

$this->title = 'Update Partes Radio: ' . ' ' . $model->idpartes_radio;
$this->params['breadcrumbs'][] = ['label' => 'Partes Radios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpartes_radio, 'url' => ['view', 'id' => $model->idpartes_radio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partes-radio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
