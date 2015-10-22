<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReporteFallaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reporte Fallas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-falla-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reporte Falla', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idreporte_falla',
            'falla_idfalla',
            'descripcion',
            'ptos_referencia',
            'fecha_inicio',
            // 'fecha_fin',
            // 'estatus',
            // 'distancia',
            // 'urgencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
