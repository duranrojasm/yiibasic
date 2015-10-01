<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCarac */

$this->title = $model->caractersticas_em_idcaractersticas_em;
$this->params['breadcrumbs'][] = ['label' => 'Equipo General Caracs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-general-carac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'caractersticas_em_idcaractersticas_em' => $model->caractersticas_em_idcaractersticas_em, 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'caractersticas_em_idcaractersticas_em' => $model->caractersticas_em_idcaractersticas_em, 'equipo_general_idequipo_general' => $model->equipo_general_idequipo_general], [
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
            'caractersticas_em_idcaractersticas_em',
            'equipo_general_idequipo_general',
            'valor',
        ],
    ]) ?>

</div>
