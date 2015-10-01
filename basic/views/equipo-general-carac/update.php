<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCarac */

$this->title = 'Update Equipo General Carac: ' . ' ' . $model->idequipo_general_carac;
$this->params['breadcrumbs'][] = ['label' => 'Equipo General Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idequipo_general_carac, 'url' => ['view', 'id' => $model->idequipo_general_carac]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipo-general-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
