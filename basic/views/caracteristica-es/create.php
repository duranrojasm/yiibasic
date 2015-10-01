<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaEs */

$this->title = 'Create Caracteristica Es';
$this->params['breadcrumbs'][] = ['label' => 'Caracteristica Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristica-es-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
