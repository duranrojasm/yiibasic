<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculo_reportef".
 *
 * @property integer $vehiculo_idvehiculo
 * @property integer $reporte_falla_idreporte_falla
 *
 * @property ReporteFalla $reporteFallaIdreporteFalla
 * @property Vehiculo $vehiculoIdvehiculo
 */
class VehiculoReportef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculo_reportef';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehiculo_idvehiculo', 'reporte_falla_idreporte_falla'], 'required'],
            [['vehiculo_idvehiculo', 'reporte_falla_idreporte_falla'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vehiculo_idvehiculo' => 'Vehiculo Idvehiculo',
            'reporte_falla_idreporte_falla' => 'Reporte Falla Idreporte Falla',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallaIdreporteFalla()
    {
        return $this->hasOne(ReporteFalla::className(), ['idreporte_falla' => 'reporte_falla_idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculoIdvehiculo()
    {
        return $this->hasOne(Vehiculo::className(), ['idvehiculo' => 'vehiculo_idvehiculo']);
    }
}
