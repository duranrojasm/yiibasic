<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdad */

$this->title = 'Update Usuario Imp Segdad: ' . ' ' . $model->idusuario_imp_segdad;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Imp Segdads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario_imp_segdad, 'url' => ['view', 'id' => $model->idusuario_imp_segdad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-imp-segdad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
