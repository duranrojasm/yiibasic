<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nodo".
 *
 * @property integer $idnodo
 * @property integer $coordenada_idcoordenada
 * @property integer $estacion_idestacion
 * @property string $tipo
 * @property string $nombre
 * @property string $direccion
 * @property string $identificacion
 * @property string $contacto_red
 * @property string $contacto_mant
 *
 * @property EstacionFo[] $estacionFos
 * @property FibraOptica[] $fibraOpticas
 * @property FibraOptica[] $fibraOpticas0
 * @property Inspeccion[] $inspeccions
 * @property Multimedia[] $multimedia
 * @property Coordenada $coordenadaIdcoordenada
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
            [['coordenada_idcoordenada', 'estacion_idestacion', 'nombre', 'direccion'], 'required'],
            [['coordenada_idcoordenada', 'estacion_idestacion'], 'integer'],
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
            'coordenada_idcoordenada' => 'Coordenada Idcoordenada',
            'estacion_idestacion' => 'Estacion Idestacion',
            'tipo' => 'Tipo',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'identificacion' => 'Identificacion',
            'contacto_red' => 'Contacto Red',
            'contacto_mant' => 'Contacto Mant',
        ];
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
    public function getCoordenadaIdcoordenada()
    {
        return $this->hasOne(Coordenada::className(), ['idcoordenada' => 'coordenada_idcoordenada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionIdestacion()
    {
        return $this->hasOne(Estacion::className(), ['idestacion' => 'estacion_idestacion']);
    }
}
