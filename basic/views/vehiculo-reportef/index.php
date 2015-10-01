<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculoReportefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehiculo Reportefs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-reportef-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehiculo Reportef', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vehiculo_idvehiculo',
            'reporte_falla_idreporte_falla',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
