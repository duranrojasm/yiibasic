<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idusuario',
            'estacion_idestacion',
            'rol_idrol',
            'vehiculo_idvehiculo',
            'nombre',
            // 'apellido',
            // 'cedula',
            // 'num_sap',
            // 'carnet',
            // 'telefono_cel',
            // 'telefono_hab',
            // 'cargo',
            // 'correo',
            // 'gerencia_general',
            // 'gerencia',
            // 'departamento',
            // 'disponibilidad:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
