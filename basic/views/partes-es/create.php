<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PartesEs */

$this->title = 'Create Partes Es';
$this->params['breadcrumbs'][] = ['label' => 'Partes Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partes-es-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
