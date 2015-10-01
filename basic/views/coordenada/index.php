<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoordenadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coordenadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordenada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coordenada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcoordenada',
            'latitud',
            'longitud',
            'asnm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
