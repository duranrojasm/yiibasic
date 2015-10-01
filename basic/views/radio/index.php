<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RadioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Radios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Radio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idradio',
            'modelo_idmodelo',
            'estacion_idestacion',
            'observaciones',
            'posicion_fisica',
            // 'nombre',
            // 'marca',
            // 'serial',
            // 'periodo_mantenimiento',
            // 'estatus',
            // 'ubicacion_disp',
            // 'estacion_idestaciondos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
