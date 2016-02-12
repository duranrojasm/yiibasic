<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RadioCaracSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Radio Caracs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-carac-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Radio Carac', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'caracteristicasrad_idcaracteristicas',
            'radio_idradio',
            'valor',
            'valorrau',
            'inspeccion_idinspeccion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
