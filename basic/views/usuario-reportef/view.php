<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioReportef */

$this->title = $model->reporte_falla_idreporte_falla;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Reportefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-reportef-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla, 'usuario_idusuario' => $model->usuario_idusuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'reporte_falla_idreporte_falla' => $model->reporte_falla_idreporte_falla, 'usuario_idusuario' => $model->usuario_idusuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'reporte_falla_idreporte_falla',
            'usuario_idusuario',
        ],
    ]) ?>

</div>
