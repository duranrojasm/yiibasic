<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ManteCorrectivo */

$this->title = 'Update Mante Correctivo: ' . ' ' . $model->idmante_correctivo;
$this->params['breadcrumbs'][] = ['label' => 'Mante Correctivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmante_correctivo, 'url' => ['view', 'id' => $model->idmante_correctivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mante-correctivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
