<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ImplementoSegurd */

$this->title = 'Update Implemento Segurd: ' . ' ' . $model->idimplemento_segurd;
$this->params['breadcrumbs'][] = ['label' => 'Implemento Segurds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idimplemento_segurd, 'url' => ['view', 'id' => $model->idimplemento_segurd]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="implemento-segurd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
