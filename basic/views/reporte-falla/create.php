<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReporteFalla */

$this->title = 'Create Reporte Falla';
$this->params['breadcrumbs'][] = ['label' => 'Reporte Fallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-falla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
