<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioEquimedi */

$this->title = $model->equipo_general_idequipo_general;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Equimedis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-equimedi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general, 'usuario_idusuario' => $model->usuario_idusuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general, 'usuario_idusuario' => $model->usuario_idusuario], [
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
            'equipo_general_idequipo_general',
            'usuario_idusuario',
        ],
    ]) ?>

</div>
