<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioEquimedi */

$this->title = 'Update Usuario Equimedi: ' . ' ' . $model->idusuario_equimedi;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Equimedis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario_equimedi, 'url' => ['view', 'id' => $model->idusuario_equimedi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-equimedi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
