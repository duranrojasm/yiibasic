<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaFo */

$this->title = 'Update Caracteristica Fo: ' . ' ' . $model->idcaracteristica_fo;
$this->params['breadcrumbs'][] = ['label' => 'Caracteristica Fos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcaracteristica_fo, 'url' => ['view', 'id' => $model->idcaracteristica_fo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caracteristica-fo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
