<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecursoFalla */

$this->title = 'Create Recurso Falla';
$this->params['breadcrumbs'][] = ['label' => 'Recurso Fallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-falla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
