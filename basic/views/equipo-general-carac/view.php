<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCarac */

$this->title = $model->idequipo_general_carac;
$this->params['breadcrumbs'][] = ['label' => 'Equipo General Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-general-carac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idequipo_general_carac], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idequipo_general_carac], [
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
            'idequipo_general_carac',
            'caractersticas_em_idcaractersticas_em',
            'equipo_general_idequipo_general',
            'valor',
        ],
    ]) ?>

</div>
