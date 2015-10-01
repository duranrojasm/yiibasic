<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdad */

$this->title = 'Update Usuario Imp Segdad: ' . ' ' . $model->implemento_segurd_idimplemento_segurd;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Imp Segdads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->implemento_segurd_idimplemento_segurd, 'url' => ['view', 'implemento_segurd_idimplemento_segurd' => $model->implemento_segurd_idimplemento_segurd, 'usuario_idusuario' => $model->usuario_idusuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-imp-segdad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
