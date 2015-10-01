<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdad */

$this->title = $model->idusuario_imp_segdad;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Imp Segdads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-imp-segdad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idusuario_imp_segdad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idusuario_imp_segdad], [
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
            'idusuario_imp_segdad',
            'implemento_segurd_idimplemento_segurd',
            'usuario_idusuario',
            'fecha',
            'cantidad_req',
            'cantidad_tiene',
            'observacion',
        ],
    ]) ?>

</div>
