<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioEquimedi */

$this->title = 'Update Usuario Equimedi: ' . ' ' . $model->equipo_general_idequipo_general;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Equimedis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipo_general_idequipo_general, 'url' => ['view', 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general, 'usuario_idusuario' => $model->usuario_idusuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-equimedi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
