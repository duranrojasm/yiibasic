<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartesRadioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partes Radios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partes-radio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Partes Radio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpartes_radio',
            'radio_idradio',
            'codigo',
            'nombre',
            'capacidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
