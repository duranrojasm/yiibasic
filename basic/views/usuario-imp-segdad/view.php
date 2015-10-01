<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdad */

$this->title = $model->implemento_segurd_idimplemento_segurd;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Imp Segdads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-imp-segdad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'implemento_segurd_idimplemento_segurd' => $model->implemento_segurd_idimplemento_segurd, 'usuario_idusuario' => $model->usuario_idusuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'implemento_segurd_idimplemento_segurd' => $model->implemento_segurd_idimplemento_segurd, 'usuario_idusuario' => $model->usuario_idusuario], [
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
            'implemento_segurd_idimplemento_segurd',
            'usuario_idusuario',
            'fecha',
            'cantidad_req',
            'cantidad_tiene',
            'observacion',
        ],
    ]) ?>

</div>
