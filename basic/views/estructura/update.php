<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estructura */

$this->title = 'Update Estructura: ' . ' ' . $model->idestructura;
$this->params['breadcrumbs'][] = ['label' => 'Estructuras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestructura, 'url' => ['view', 'id' => $model->idestructura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estructura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
