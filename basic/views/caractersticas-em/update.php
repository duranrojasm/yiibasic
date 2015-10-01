<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaractersticasEm */

$this->title = 'Update Caractersticas Em: ' . ' ' . $model->idcaractersticas_em;
$this->params['breadcrumbs'][] = ['label' => 'Caractersticas Ems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcaractersticas_em, 'url' => ['view', 'id' => $model->idcaractersticas_em]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caractersticas-em-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
