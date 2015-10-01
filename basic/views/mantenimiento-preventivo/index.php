<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MantenimientoPreventivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mantenimiento Preventivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-preventivo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mantenimiento Preventivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idmantenimiento_preventivo',
            'fibra_optica_idfibra_optica',
            'equipo_general_idequipo_general',
            'enlace_satelital_idenlace_satelital',
            'radio_idradio',
            // 'reporte_preven_idreporte_preven',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
