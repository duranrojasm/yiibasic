<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnlaceSatelitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enlace Satelitals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enlace Satelital', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idenlace_satelital',
            'torre_idtorre',
            'cliente_idcliente',
            'estacion_idestacion',
            'codigo',
            // 'nombre',
            // 'num_antena',
            // 'periodo_mantenimiento',
            // 'estatus',
            // 'ubicacion_disp',
            // 'estacion_idestaciondos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
