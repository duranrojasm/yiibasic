<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mante_correctivo".
 *
 * @property integer $idmante_correctivo
 * @property integer $reporte_falla_idreporte_falla
 * @property integer $equipo_general_idequipo_general
 * @property integer $enlace_satelital_idenlace_satelital
 * @property integer $radio_idradio
 * @property integer $fibra_optica_idfibra_optica
 *
 * @property EnlaceSatelital $enlaceSatelitalIdenlaceSatelital
 * @property EquipoGeneral $equipoGeneralIdequipoGeneral
 * @property FibraOptica $fibraOpticaIdfibraOptica
 * @property Radio $radioIdradio
 * @property ReporteFalla $reporteFallaIdreporteFalla
 */
class ManteCorrectivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mante_correctivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reporte_falla_idreporte_falla'], 'required'],
            [['reporte_falla_idreporte_falla', 'equipo_general_idequipo_general', 'enlace_satelital_idenlace_satelital', 'radio_idradio', 'fibra_optica_idfibra_optica'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmante_correctivo' => 'Idmante Correctivo',
            'reporte_falla_idreporte_falla' => 'Reporte Falla Idreporte Falla',
            'equipo_general_idequipo_general' => 'Equipo General Idequipo General',
            'enlace_satelital_idenlace_satelital' => 'Enlace Satelital Idenlace Satelital',
            'radio_idradio' => 'Radio Idradio',
            'fibra_optica_idfibra_optica' => 'Fibra Optica Idfibra Optica',
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
    public function getReporteFallaIdreporteFalla()
    {
        return $this->hasOne(ReporteFalla::className(), ['idreporte_falla' => 'reporte_falla_idreporte_falla']);
    }
}
