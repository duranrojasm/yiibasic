<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Caracteristicasrad */

$this->title = 'Create Caracteristicasrad';
$this->params['breadcrumbs'][] = ['label' => 'Caracteristicasrads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristicasrad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
