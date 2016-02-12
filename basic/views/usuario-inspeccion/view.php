<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioInspeccion */

$this->title = $model->inspeccion_idinspeccion;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Inspeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-inspeccion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'usuario_idusuario' => $model->usuario_idusuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'usuario_idusuario' => $model->usuario_idusuario], [
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
            'inspeccion_idinspeccion',
            'usuario_idusuario',
        ],
    ]) ?>

</div>
