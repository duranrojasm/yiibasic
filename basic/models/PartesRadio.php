<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partes_radio".
 *
 * @property integer $idpartes_radio
 * @property integer $radio_idradio
 * @property string $codigo
 * @property string $nombre
 * @property double $capacidad
 *
 * @property Radio $radioIdradio
 */
class PartesRadio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partes_radio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['radio_idradio'], 'required'],
            [['radio_idradio'], 'integer'],
            [['capacidad'], 'number'],
            [['codigo'], 'string', 'max' => 30],
            [['nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpartes_radio' => 'Idpartes Radio',
            'radio_idradio' => 'Radio',
            'codigo' => 'Código',
            'nombre' => 'Nombre',
            'capacidad' => 'Capacidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioIdradio()
    {
        return $this->hasOne(Radio::className(), ['idradio' => 'radio_idradio']);
    }
}
