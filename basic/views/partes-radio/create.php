<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PartesRadio */

$this->title = 'Create Partes Radio';
$this->params['breadcrumbs'][] = ['label' => 'Partes Radios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partes-radio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
