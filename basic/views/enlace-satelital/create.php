<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelital */

$this->title = 'Create Enlace Satelital';
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelitals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
