<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Falla */

$this->title = 'Create Falla';
$this->params['breadcrumbs'][] = ['label' => 'Fallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="falla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
