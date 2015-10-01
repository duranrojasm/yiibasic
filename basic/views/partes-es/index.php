<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartesEsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partes Es';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partes-es-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Partes Es', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpartes_es',
            'enlace_satelital_idenlace_satelital',
            'nombre',
            'serial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
