<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FibraOpticaCarac */

$this->title = 'Create Fibra Optica Carac';
$this->params['breadcrumbs'][] = ['label' => 'Fibra Optica Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-carac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
