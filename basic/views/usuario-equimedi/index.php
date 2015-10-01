<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioEquimediSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Equimedis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-equimedi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Equimedi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idusuario_equimedi',
            'equipo_general_idequipo_general',
            'usuario_idusuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
