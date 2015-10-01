<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioReportefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Reportefs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-reportef-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Reportef', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'reporte_falla_idreporte_falla',
            'usuario_idusuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
