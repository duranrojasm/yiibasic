<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManteCorrectivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mante Correctivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mante-correctivo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mante Correctivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idmante_correctivo',
            'reporte_falla_idreporte_falla',
            'equipo_general_idequipo_general',
            'enlace_satelital_idenlace_satelital',
            'radio_idradio',
            // 'fibra_optica_idfibra_optica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
