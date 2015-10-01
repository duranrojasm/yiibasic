<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOptica */

$this->title = 'Update Fibra Optica: ' . ' ' . $model->idfibra_optica;
$this->params['breadcrumbs'][] = ['label' => 'Fibra Opticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfibra_optica, 'url' => ['view', 'id' => $model->idfibra_optica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fibra-optica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
