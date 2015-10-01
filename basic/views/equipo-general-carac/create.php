<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCarac */

$this->title = 'Create Equipo General Carac';
$this->params['breadcrumbs'][] = ['label' => 'Equipo General Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-general-carac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
