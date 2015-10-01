<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estacion".
 *
 * @property integer $idestacion
 * @property integer $coordenada_idcoordenada
 * @property integer $localidad_idlocalidad
 * @property string $codigo
 * @property string $nombre
 * @property string $tipo_central
 * @property string $telefono
 * @property string $direccion
 * @property integer $distancia
 * @property double $tiempo
 *
 * @property EnlaceSatelital[] $enlaceSatelitals
 * @property EnlaceSatelital[] $enlaceSatelitals0
 * @property Coordenada $coordenadaIdcoordenada
 * @property Localidad $localidadIdlocalidad
 * @property EstacionFo[] $estacionFos
 * @property Estructura[] $estructuras
 * @property FibraOptica[] $fibraOpticas
 * @property FibraOptica[] $fibraOpticas0
 * @property Inspeccion[] $inspeccions
 * @property Multimedia[] $multimedia
 * @property Nodo[] $nodos
 * @property Radio[] $radios
 * @property Radio[] $radios0
 * @property Usuario[] $usuarios
 */
class Estacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coordenada_idcoordenada', 'localidad_idlocalidad', 'codigo', 'nombre'], 'required'],
            [['coordenada_idcoordenada', 'localidad_idlocalidad', 'distancia'], 'integer'],
            [['tiempo'], 'number'],
            [['codigo'], 'string', 'max' => 30],
            [['nombre', 'telefono'], 'string', 'max' => 50],
            [['tipo_central'], 'string', 'max' => 20],
            [['direccion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestacion' => 'Idestacion',
            'coordenada_idcoordenada' => 'Coordenada Idcoordenada',
            'localidad_idlocalidad' => 'Localidad Idlocalidad',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'tipo_central' => 'Tipo Central',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'distancia' => 'Distancia',
            'tiempo' => 'Tiempo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitals()
    {
        return $this->hasMany(EnlaceSatelital::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitals0()
    {
        return $this->hasMany(EnlaceSatelital::className(), ['estacion_idestacion' => 'idestacion']);
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
    public function getLocalidadIdlocalidad()
    {
        return $this->hasOne(Localidad::className(), ['idlocalidad' => 'localidad_idlocalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionFos()
    {
        return $this->hasMany(EstacionFo::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructuras()
    {
        return $this->hasMany(Estructura::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticas()
    {
        return $this->hasMany(FibraOptica::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticas0()
    {
        return $this->hasMany(FibraOptica::className(), ['estacion_idestaciondos' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspeccions()
    {
        return $this->hasMany(Inspeccion::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultimedia()
    {
        return $this->hasMany(Multimedia::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodos()
    {
        return $this->hasMany(Nodo::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadios()
    {
        return $this->hasMany(Radio::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadios0()
    {
        return $this->hasMany(Radio::className(), ['estacion_idestacion' => 'idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['estacion_idestacion' => 'idestacion']);
    }
}
