<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ImplementoSegurd */

$this->title = 'Create Implemento Segurd';
$this->params['breadcrumbs'][] = ['label' => 'Implemento Segurds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="implemento-segurd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
