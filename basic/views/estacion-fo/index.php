<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstacionFoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estacion Fos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estacion-fo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estacion Fo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idestacion_fo',
            'nodo_idnodo',
            'fibra_optica_idfibra_optica',
            'estacion_idestacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
