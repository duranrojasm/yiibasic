<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneral */

$this->title = 'Update Equipo General: ' . ' ' . $model->idequipo_general;
$this->params['breadcrumbs'][] = ['label' => 'Equipo Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idequipo_general, 'url' => ['view', 'id' => $model->idequipo_general]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipo-general-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
