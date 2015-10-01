<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipoGeneralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipo Generals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-general-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipo General', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idequipo_general',
            'nombre',
            'marca',
            'serial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
