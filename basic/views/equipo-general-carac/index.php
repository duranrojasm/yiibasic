<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipoGeneralCaracSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipo General Caracs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-general-carac-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipo General Carac', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idequipo_general_carac',
            'caractersticas_em_idcaractersticas_em',
            'equipo_general_idequipo_general',
            'valor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
