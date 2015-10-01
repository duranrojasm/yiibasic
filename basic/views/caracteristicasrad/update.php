<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caracteristicasrad */

$this->title = 'Update Caracteristicasrad: ' . ' ' . $model->idcaracteristicasrad;
$this->params['breadcrumbs'][] = ['label' => 'Caracteristicasrads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcaracteristicasrad, 'url' => ['view', 'id' => $model->idcaracteristicasrad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caracteristicasrad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
