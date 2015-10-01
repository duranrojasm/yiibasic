<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo_general_carac".
 *
 * @property integer $idequipo_general_carac
 * @property integer $caractersticas_em_idcaractersticas_em
 * @property integer $equipo_general_idequipo_general
 * @property string $valor
 *
 * @property CaractersticasEm $caractersticasEmIdcaractersticasEm
 * @property EquipoGeneral $equipoGeneralIdequipoGeneral
 */
class EquipoGeneralCarac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo_general_carac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caractersticas_em_idcaractersticas_em', 'equipo_general_idequipo_general'], 'required'],
            [['caractersticas_em_idcaractersticas_em', 'equipo_general_idequipo_general'], 'integer'],
            [['valor'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idequipo_general_carac' => 'Idequipo General Carac',
            'caractersticas_em_idcaractersticas_em' => 'Caractersticas Em Idcaractersticas Em',
            'equipo_general_idequipo_general' => 'Equipo General Idequipo General',
            'valor' => 'Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaractersticasEmIdcaractersticasEm()
    {
        return $this->hasOne(CaractersticasEm::className(), ['idcaractersticas_em' => 'caractersticas_em_idcaractersticas_em']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipoGeneralIdequipoGeneral()
    {
        return $this->hasOne(EquipoGeneral::className(), ['idequipo_general' => 'equipo_general_idequipo_general']);
    }
}
