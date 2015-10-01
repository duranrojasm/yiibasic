<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImplementoSegurdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Implemento Segurds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="implemento-segurd-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Implemento Segurd', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idimplemento_segurd',
            'nombre',
            'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
