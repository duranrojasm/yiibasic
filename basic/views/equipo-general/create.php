<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneral */

$this->title = 'Create Equipo General';
$this->params['breadcrumbs'][] = ['label' => 'Equipo Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-general-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
