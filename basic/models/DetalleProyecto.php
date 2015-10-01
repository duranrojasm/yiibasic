<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_proyecto".
 *
 * @property integer $iddetalle_proyecto
 * @property integer $reporte_preven_idreporte_preven
 * @property integer $reporte_falla_idreporte_falla
 *
 * @property ReporteFalla $reporteFallaIdreporteFalla
 * @property ReportePreven $reportePrevenIdreportePreven
 * @property Multimedia[] $multimedia
 */
class DetalleProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reporte_preven_idreporte_preven', 'reporte_falla_idreporte_falla'], 'required'],
            [['reporte_preven_idreporte_preven', 'reporte_falla_idreporte_falla'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalle_proyecto' => 'Iddetalle Proyecto',
            'reporte_preven_idreporte_preven' => 'Reporte Preven Idreporte Preven',
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
    public function getReportePrevenIdreportePreven()
    {
        return $this->hasOne(ReportePreven::className(), ['idreporte_preven' => 'reporte_preven_idreporte_preven']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultimedia()
    {
        return $this->hasMany(Multimedia::className(), ['detalle_proyecto_iddetalle_proyecto' => 'iddetalle_proyecto']);
    }
}
