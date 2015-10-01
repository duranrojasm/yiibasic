<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mantenimiento_preventivo".
 *
 * @property integer $idmantenimiento_preventivo
 * @property integer $fibra_optica_idfibra_optica
 * @property integer $equipo_general_idequipo_general
 * @property integer $enlace_satelital_idenlace_satelital
 * @property integer $radio_idradio
 * @property integer $reporte_preven_idreporte_preven
 *
 * @property EnlaceSatelital $enlaceSatelitalIdenlaceSatelital
 * @property EquipoGeneral $equipoGeneralIdequipoGeneral
 * @property FibraOptica $fibraOpticaIdfibraOptica
 * @property Radio $radioIdradio
 * @property ReportePreven $reportePrevenIdreportePreven
 */
class MantenimientoPreventivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mantenimiento_preventivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fibra_optica_idfibra_optica', 'equipo_general_idequipo_general', 'enlace_satelital_idenlace_satelital', 'radio_idradio', 'reporte_preven_idreporte_preven'], 'integer'],
            [['reporte_preven_idreporte_preven'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmantenimiento_preventivo' => 'Idmantenimiento Preventivo',
            'fibra_optica_idfibra_optica' => 'Fibra Optica Idfibra Optica',
            'equipo_general_idequipo_general' => 'Equipo General Idequipo General',
            'enlace_satelital_idenlace_satelital' => 'Enlace Satelital Idenlace Satelital',
            'radio_idradio' => 'Radio Idradio',
            'reporte_preven_idreporte_preven' => 'Reporte Preven Idreporte Preven',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitalIdenlaceSatelital()
    {
        return $this->hasOne(EnlaceSatelital::className(), ['idenlace_satelital' => 'enlace_satelital_idenlace_satelital']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipoGeneralIdequipoGeneral()
    {
        return $this->hasOne(EquipoGeneral::className(), ['idequipo_general' => 'equipo_general_idequipo_general']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticaIdfibraOptica()
    {
        return $this->hasOne(FibraOptica::className(), ['idfibra_optica' => 'fibra_optica_idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioIdradio()
    {
        return $this->hasOne(Radio::className(), ['idradio' => 'radio_idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportePrevenIdreportePreven()
    {
        return $this->hasOne(ReportePreven::className(), ['idreporte_preven' => 'reporte_preven_idreporte_preven']);
    }
}
