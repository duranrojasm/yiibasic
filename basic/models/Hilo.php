<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hilo".
 *
 * @property integer $idhilo
 * @property integer $fibra_idfibra_optica
 * @property integer $numhilo
 * @property string $ttodest
 * @property string $ab
 * @property string $sist
 * @property string $band
 * @property string $odf
 * @property string $observ
 * @property string $des_esp
 *
 * @property FibraOpticaCarac[] $fibraOpticaCaracs
 * @property CaracteristicaFo[] $caracteristicaFoIdcaracteristicas
 * @property FibraOptica $fibraIdfibraOptica
 */
class Hilo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hilo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fibra_idfibra_optica', 'numhilo'], 'required'],
            [['fibra_idfibra_optica', 'numhilo'], 'integer'],
            [['ttodest', 'ab', 'sist', 'band', 'odf', 'observ', 'des_esp'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idhilo' => 'Idhilo',
            'fibra_idfibra_optica' => 'Fibra Idfibra Optica',
            'numhilo' => 'Numhilo',
            'ttodest' => 'Ttodest',
            'ab' => 'Ab',
            'sist' => 'Sist',
            'band' => 'Band',
            'odf' => 'Odf',
            'observ' => 'Observ',
            'des_esp' => 'Des Esp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticaCaracs()
    {
        return $this->hasMany(FibraOpticaCarac::className(), ['hilo_idhilo' => 'idhilo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaFoIdcaracteristicas()
    {
        return $this->hasMany(CaracteristicaFo::className(), ['idcaracteristica_fo' => 'caracteristica_fo_idcaracteristica'])->viaTable('fibra_optica_carac', ['hilo_idhilo' => 'idhilo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraIdfibraOptica()
    {
        return $this->hasOne(FibraOptica::className(), ['idfibra_optica' => 'fibra_idfibra_optica']);
    }
}
