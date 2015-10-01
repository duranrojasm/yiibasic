<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecursoFalla */

$this->title = 'Update Recurso Falla: ' . ' ' . $model->idrecurso_falla;
$this->params['breadcrumbs'][] = ['label' => 'Recurso Fallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrecurso_falla, 'url' => ['view', 'id' => $model->idrecurso_falla]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recurso-falla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
