<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstructurEq */

$this->title = 'Create Estructur Eq';
$this->params['breadcrumbs'][] = ['label' => 'Estructur Eqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructur-eq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
