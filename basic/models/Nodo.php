<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nodo".
 *
 * @property integer $idnodo
 * @property integer $estacion_idestacion
 * @property string $tipo
 * @property string $nombre
 * @property string $direccion
 * @property string $identificacion
 * @property string $contacto_red
 * @property string $contacto_mant
 *
 * @property Coordenada[] $coordenadas
 * @property EstacionFo[] $estacionFos
 * @property FibraOptica[] $fibraOpticas
 * @property FibraOptica[] $fibraOpticas0
 * @property Inspeccion[] $inspeccions
 * @property Multimedia[] $multimedia
 * @property Estacion $estacionIdestacion
 */
class Nodo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nodo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estacion_idestacion', 'nombre', 'direccion'], 'required'],
            [['estacion_idestacion'], 'integer'],
            [['tipo', 'contacto_red', 'contacto_mant'], 'string', 'max' => 20],
            [['nombre', 'direccion'], 'string', 'max' => 50],
            [['identificacion'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnodo' => 'Idnodo',
            'estacion_idestacion' => 'Estación',
            'tipo' => 'Tipo',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'identificacion' => 'Identificación',
            'contacto_red' => 'Contacto Red',
            'contacto_mant' => 'Contacto Mant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenadas()
    {
        return $this->hasMany(Coordenada::className(), ['nodo' => 'idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionFos()
    {
        return $this->hasMany(EstacionFo::className(), ['nodo_idnodo' => 'idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticas()
    {
        return $this->hasMany(FibraOptica::className(), ['nodo_idnodo' => 'idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticas0()
    {
        return $this->hasMany(FibraOptica::className(), ['nodo_idnododos' => 'idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspeccions()
    {
        return $this->hasMany(Inspeccion::className(), ['nodo_idnodo' => 'idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultimedia()
    {
        return $this->hasMany(Multimedia::className(), ['nodo_idnodo' => 'idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionIdestacion()
    {
        return $this->hasOne(Estacion::className(), ['idestacion' => 'estacion_idestacion']);
    }
}
