<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo_general".
 *
 * @property integer $idequipo_general
 * @property string $nombre
 * @property string $marca
 * @property string $serial
 *
 * @property EquipoGeneralCarac[] $equipoGeneralCaracs
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property MantenimientoPreventivo[] $mantenimientoPreventivos
 * @property UsuarioEquimedi[] $usuarioEquimedis
 */
class EquipoGeneral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo_general';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'marca', 'serial'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idequipo_general' => 'Idequipo General',
            'nombre' => 'Nombre',
            'marca' => 'Marca',
            'serial' => 'Serial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipoGeneralCaracs()
    {
        return $this->hasMany(EquipoGeneralCarac::className(), ['equipo_general_idequipo_general' => 'idequipo_general']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManteCorrectivos()
    {
        return $this->hasMany(ManteCorrectivo::className(), ['equipo_general_idequipo_general' => 'idequipo_general']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientoPreventivos()
    {
        return $this->hasMany(MantenimientoPreventivo::className(), ['equipo_general_idequipo_general' => 'idequipo_general']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioEquimedis()
    {
        return $this->hasMany(UsuarioEquimedi::className(), ['equipo_general_idequipo_general' => 'idequipo_general']);
    }
}
