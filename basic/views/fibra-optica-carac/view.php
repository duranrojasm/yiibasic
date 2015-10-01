<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOpticaCarac */

$this->title = $model->caracteristica_fo_idcaracteristica;
$this->params['breadcrumbs'][] = ['label' => 'Fibra Optica Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-carac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'caracteristica_fo_idcaracteristica' => $model->caracteristica_fo_idcaracteristica, 'fibra_optica_idfibra_optica' => $model->fibra_optica_idfibra_optica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'caracteristica_fo_idcaracteristica' => $model->caracteristica_fo_idcaracteristica, 'fibra_optica_idfibra_optica' => $model->fibra_optica_idfibra_optica], [
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
            'caracteristica_fo_idcaracteristica',
            'fibra_optica_idfibra_optica',
            'valor',
        ],
    ]) ?>

</div>
