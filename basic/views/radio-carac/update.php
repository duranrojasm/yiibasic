<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RadioCarac */

$this->title = 'Update Radio Carac: ' . ' ' . $model->caracteristicasrad_idcaracteristicas;
$this->params['breadcrumbs'][] = ['label' => 'Radio Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->caracteristicasrad_idcaracteristicas, 'url' => ['view', 'caracteristicasrad_idcaracteristicas' => $model->caracteristicasrad_idcaracteristicas, 'radio_idradio' => $model->radio_idradio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="radio-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
