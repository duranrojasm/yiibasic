<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalCarac */

$this->title = 'Update Enlace Satelital Carac: ' . ' ' . $model->caracteristica_es_idcaracteristica;
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelital Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->caracteristica_es_idcaracteristica, 'url' => ['view', 'caracteristica_es_idcaracteristica' => $model->caracteristica_es_idcaracteristica, 'enlace_satelital_idenlace_satelital' => $model->enlace_satelital_idenlace_satelital]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enlace-satelital-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
