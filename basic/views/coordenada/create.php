<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Coordenada */

$this->title = 'Create Coordenada';
$this->params['breadcrumbs'][] = ['label' => 'Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordenada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
