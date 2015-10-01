<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PartesEs */

$this->title = 'Update Partes Es: ' . ' ' . $model->idpartes_es;
$this->params['breadcrumbs'][] = ['label' => 'Partes Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpartes_es, 'url' => ['view', 'id' => $model->idpartes_es]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partes-es-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
