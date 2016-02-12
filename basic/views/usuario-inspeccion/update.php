<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioInspeccion */

$this->title = 'Update Usuario Inspeccion: ' . ' ' . $model->inspeccion_idinspeccion;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Inspeccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inspeccion_idinspeccion, 'url' => ['view', 'inspeccion_idinspeccion' => $model->inspeccion_idinspeccion, 'usuario_idusuario' => $model->usuario_idusuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-inspeccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
