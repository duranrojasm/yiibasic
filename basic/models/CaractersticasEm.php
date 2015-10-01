<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caractersticas_em".
 *
 * @property integer $idcaractersticas_em
 * @property string $nombre
 * @property string $tipo
 *
 * @property EquipoGeneralCarac[] $equipoGeneralCaracs
 */
class CaractersticasEm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caractersticas_em';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcaractersticas_em' => 'Idcaractersticas Em',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipoGeneralCaracs()
    {
        return $this->hasMany(EquipoGeneralCarac::className(), ['caractersticas_em_idcaractersticas_em' => 'idcaractersticas_em']);
    }
}
