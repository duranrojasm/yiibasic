<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaFo */

$this->title = 'Create Caracteristica Fo';
$this->params['breadcrumbs'][] = ['label' => 'Caracteristica Fos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristica-fo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
