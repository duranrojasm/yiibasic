<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hilo */

$this->title = 'Create Hilo';
$this->params['breadcrumbs'][] = ['label' => 'Hilos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hilo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
