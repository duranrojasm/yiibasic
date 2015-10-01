<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nodo */

$this->title = 'Create Nodo';
$this->params['breadcrumbs'][] = ['label' => 'Nodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
