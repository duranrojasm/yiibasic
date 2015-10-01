<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Torre */

$this->title = 'Create Torre';
$this->params['breadcrumbs'][] = ['label' => 'Torres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
