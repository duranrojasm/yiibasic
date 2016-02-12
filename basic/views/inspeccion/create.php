<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inspeccion */

$this->title = 'Create Inspeccion';
$this->params['breadcrumbs'][] = ['label' => 'Inspeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspeccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formnodo', [
        'model' => $model,
        'modelsEstadoItemIns'=> $modelsEstadoItemIns,
    ]) ?>

</div>
