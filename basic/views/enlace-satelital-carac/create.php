<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalCarac */

$this->title = 'Create Enlace Satelital Carac';
$this->params['breadcrumbs'][] = ['label' => 'Enlace Satelital Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-carac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
