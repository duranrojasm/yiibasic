<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstructurEq */

$this->title = 'Update Estructur Eq: ' . ' ' . $model->radio_idradio;
$this->params['breadcrumbs'][] = ['label' => 'Estructur Eqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->radio_idradio, 'url' => ['view', 'radio_idradio' => $model->radio_idradio, 'estructura_idestructura' => $model->estructura_idestructura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estructur-eq-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
