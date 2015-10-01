<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCarac */

$this->title = 'Update Equipo General Carac: ' . ' ' . $model->caractersticas_em_idcaractersticas_em;
$this->params['breadcrumbs'][] = ['label' => 'Equipo General Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->caractersticas_em_idcaractersticas_em, 'url' => ['view', 'caractersticas_em_idcaractersticas_em' => $model->caractersticas_em_idcaractersticas_em, 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipo-general-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
