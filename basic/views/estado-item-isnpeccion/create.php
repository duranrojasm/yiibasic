<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccion */

$this->title = 'Create Estado Item Isnpeccion';
$this->params['breadcrumbs'][] = ['label' => 'Estado Item Isnpeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-item-isnpeccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
