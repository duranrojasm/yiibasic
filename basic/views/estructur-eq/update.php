<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstructurEq */

$this->title = 'Update Estructur Eq: ' . ' ' . $model->idestructur_eq;
$this->params['breadcrumbs'][] = ['label' => 'Estructur Eqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestructur_eq, 'url' => ['view', 'id' => $model->idestructur_eq]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estructur-eq-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
