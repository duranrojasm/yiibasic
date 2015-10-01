<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoPreventivo */

$this->title = 'Create Mantenimiento Preventivo';
$this->params['breadcrumbs'][] = ['label' => 'Mantenimiento Preventivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-preventivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
