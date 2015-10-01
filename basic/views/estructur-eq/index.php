<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstructurEqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estructur Eqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructur-eq-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estructur Eq', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idestructur_eq',
            'radio_idradio',
            'estructura_idestructura',
            'fecha',
            'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
