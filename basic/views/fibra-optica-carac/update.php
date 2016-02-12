<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOpticaCarac */

$this->title = 'Update Fibra Optica Carac: ' . ' ' . $model->caracteristica_fo_idcaracteristica;
$this->params['breadcrumbs'][] = ['label' => 'Fibra Optica Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->caracteristica_fo_idcaracteristica, 'url' => ['view', 'caracteristica_fo_idcaracteristica' => $model->caracteristica_fo_idcaracteristica, 'hilo_idhilo' => $model->hilo_idhilo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fibra-optica-carac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
