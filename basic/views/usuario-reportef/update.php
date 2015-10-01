<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioReportef */

$this->title = 'Update Usuario Reportef: ' . ' ' . $model->reporte_falla_idreporte_falla;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Reportefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reporte_falla_idreporte_falla, 'url' => ['view', 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla, 'usuario_idusuario' => $model->usuario_idusuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-reportef-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
