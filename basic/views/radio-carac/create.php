<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RadioCarac */

$this->title = 'Create Radio Carac';
$this->params['breadcrumbs'][] = ['label' => 'Radio Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-carac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
