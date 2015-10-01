<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaEs */

$this->title = 'Update Caracteristica Es: ' . ' ' . $model->idcaracteristica_es;
$this->params['breadcrumbs'][] = ['label' => 'Caracteristica Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcaracteristica_es, 'url' => ['view', 'id' => $model->idcaracteristica_es]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caracteristica-es-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
