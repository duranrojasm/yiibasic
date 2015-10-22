<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estacion */

$this->title = 'Update Estacion: ' . ' ' . $model->idestacion;
$this->params['breadcrumbs'][] = ['label' => 'Estacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestacion, 'url' => ['view', 'id' => $model->idestacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formup', [
        'model' => $model,

    ]) ?>

</div>
