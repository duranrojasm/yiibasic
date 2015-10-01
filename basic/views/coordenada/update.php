<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coordenada */

$this->title = 'Update Coordenada: ' . ' ' . $model->idcoordenada;
$this->params['breadcrumbs'][] = ['label' => 'Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcoordenada, 'url' => ['view', 'id' => $model->idcoordenada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coordenada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
