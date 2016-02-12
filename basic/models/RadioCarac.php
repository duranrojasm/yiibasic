<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radio_carac".
 *
 * @property integer $caracteristicasrad_idcaracteristicas
 * @property integer $radio_idradio
 * @property string $valor
 * @property string $valorrau
 * @property integer $inspeccion_idinspeccion
 *
 * @property Caracteristicasrad $caracteristicasradIdcaracteristicas
 * @property Inspeccion $inspeccionIdinspeccion
 * @property Radio $radioIdradio
 */
class RadioCarac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'radio_carac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caracteristicasrad_idcaracteristicas', 'radio_idradio', 'valor'], 'required'],
            [['caracteristicasrad_idcaracteristicas', 'radio_idradio', 'inspeccion_idinspeccion'], 'integer'],
            [['valor', 'valorrau'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'caracteristicasrad_idcaracteristicas' => 'Caracteristicasrad Idcaracteristicas',
            'radio_idradio' => 'Radio Idradio',
            'valor' => 'Valor',
            'valorrau' => 'Valorrau',
            'inspeccion_idinspeccion' => 'Inspeccion Idinspeccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicasradIdcaracteristicas()
    {
        return $this->hasOne(Caracteristicasrad::className(), ['idcaracteristicasrad' => 'caracteristicasrad_idcaracteristicas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspeccionIdinspeccion()
    {
        return $this->hasOne(Inspeccion::className(), ['idinspeccion' => 'inspeccion_idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioIdradio()
    {
        return $this->hasOne(Radio::className(), ['idradio' => 'radio_idradio']);
    }
}
