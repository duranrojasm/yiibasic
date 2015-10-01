<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ManteCorrectivo */

$this->title = 'Create Mante Correctivo';
$this->params['breadcrumbs'][] = ['label' => 'Mante Correctivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mante-correctivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
