<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FibraOpticaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fibra Opticas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fibra Optica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idfibra_optica',
            'nodo_idnodo',
            'estacion_idestacion',
            'nombre',
            'distancia',
            // 'observacion',
            // 'periodo_mantenimiento',
            // 'estacion_idestaciondos',
            // 'nodo_idnododos',
            // 'rango1',
            // 'rango2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
