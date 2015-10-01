<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstacionFo */

$this->title = 'Create Estacion Fo';
$this->params['breadcrumbs'][] = ['label' => 'Estacion Fos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estacion-fo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
