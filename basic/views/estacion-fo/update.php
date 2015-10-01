<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstacionFo */

$this->title = 'Update Estacion Fo: ' . ' ' . $model->idestacion_fo;
$this->params['breadcrumbs'][] = ['label' => 'Estacion Fos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestacion_fo, 'url' => ['view', 'id' => $model->idestacion_fo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estacion-fo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
