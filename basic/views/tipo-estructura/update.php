<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEstructura */

$this->title = 'Update Tipo Estructura: ' . ' ' . $model->idtipo_estructura;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Estructuras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_estructura, 'url' => ['view', 'id' => $model->idtipo_estructura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-estructura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
