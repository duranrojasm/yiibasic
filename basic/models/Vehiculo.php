<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculo".
 *
 * @property integer $idvehiculo
 * @property string $control
 * @property string $placa
 * @property string $marca
 * @property string $modelo
 * @property integer $ano
 * @property string $unidad
 * @property string $estado
 * @property string $aviso
 * @property string $obser_aviso
 * @property string $fecha
 * @property string $estatus
 *
 * @property VehiculoReportef[] $vehiculoReportefs
 * @property ReporteFalla[] $reporteFallaIdreporteFallas
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['control', 'placa'], 'required'],
            [['ano'], 'integer'],
            [['fecha'], 'safe'],
            [['control', 'marca', 'modelo', 'unidad', 'estado', 'aviso', 'estatus'], 'string', 'max' => 20],
            [['placa'], 'string', 'max' => 10],
            [['obser_aviso'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idvehiculo' => 'Idvehiculo',
            'control' => 'Control',
            'placa' => 'Placa',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'ano' => 'Año',
            'unidad' => 'Unidad',
            'estado' => 'Estado',
            'aviso' => 'Aviso',
            'obser_aviso' => 'Ob. Aviso',
            'fecha' => 'Fecha Av.',
            'estatus' => 'Disponibilidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculoReportefs()
    {
        return $this->hasMany(VehiculoReportef::className(), ['vehiculo_idvehiculo' => 'idvehiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallaIdreporteFallas()
    {
        return $this->hasMany(ReporteFalla::className(), ['idreporte_falla' => 'reporte_falla_idreporte_falla'])->viaTable('vehiculo_reportef', ['vehiculo_idvehiculo' => 'idvehiculo']);
    }
}
