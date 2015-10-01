<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nodo */

$this->title = 'Update Nodo: ' . ' ' . $model->idnodo;
$this->params['breadcrumbs'][] = ['label' => 'Nodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnodo, 'url' => ['view', 'id' => $model->idnodo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
