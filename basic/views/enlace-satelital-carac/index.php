<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnlaceSatelitalCaracSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enlace Satelital Caracs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-satelital-carac-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enlace Satelital Carac', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idenlace_satelital_carac',
            'caracteristica_es_idcaracteristica',
            'enlace_satelital_idenlace_satelital',
            'valor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
