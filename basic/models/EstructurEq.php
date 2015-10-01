<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estructur_eq".
 *
 * @property integer $radio_idradio
 * @property integer $estructura_idestructura
 * @property string $fecha
 * @property string $observacion
 *
 * @property Estructura $estructuraIdestructura
 * @property Radio $radioIdradio
 */
class EstructurEq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estructur_eq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['radio_idradio', 'estructura_idestructura'], 'required'],
            [['radio_idradio', 'estructura_idestructura'], 'integer'],
            [['fecha'], 'safe'],
            [['observacion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'radio_idradio' => 'Radio Idradio',
            'estructura_idestructura' => 'Estructura Idestructura',
            'fecha' => 'Fecha',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructuraIdestructura()
    {
        return $this->hasOne(Estructura::className(), ['idestructura' => 'estructura_idestructura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioIdradio()
    {
        return $this->hasOne(Radio::className(), ['idradio' => 'radio_idradio']);
    }
}
