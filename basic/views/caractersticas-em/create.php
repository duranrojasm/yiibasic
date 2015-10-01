<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CaractersticasEm */

$this->title = 'Create Caractersticas Em';
$this->params['breadcrumbs'][] = ['label' => 'Caractersticas Ems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caractersticas-em-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
