<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioReportef */

$this->title = 'Update Usuario Reportef: ' . ' ' . $model->idusuario_reportef;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Reportefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario_reportef, 'url' => ['view', 'id' => $model->idusuario_reportef]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-reportef-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
