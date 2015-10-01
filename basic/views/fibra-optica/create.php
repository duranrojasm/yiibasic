<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FibraOptica */

$this->title = 'Create Fibra Optica';
$this->params['breadcrumbs'][] = ['label' => 'Fibra Opticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
