<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Localidad */

$this->title = 'Update Localidad: ' . ' ' . $model->idlocalidad;
$this->params['breadcrumbs'][] = ['label' => 'Localidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlocalidad, 'url' => ['view', 'id' => $model->idlocalidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
