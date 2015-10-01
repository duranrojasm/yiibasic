<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstructuraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estructuras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estructura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idestructura',
            'estacion_idestacion',
            'tipo_estructura_idtipo_estructura',
            'estructura_idestructura',
            'codigo',
            // 'nombre',
            // 'cantidad',
            // 'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
