<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaracteristicasradSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caracteristicasrads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristicasrad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Caracteristicasrad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcaracteristicasrad',
            'nombre',
            'tipo',
            'rau',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
