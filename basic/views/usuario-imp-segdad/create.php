<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdad */

$this->title = 'Create Usuario Imp Segdad';
$this->params['breadcrumbs'][] = ['label' => 'Usuario Imp Segdads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-imp-segdad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
