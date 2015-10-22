<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fibra_optica".
 *
 * @property integer $idfibra_optica
 * @property integer $nodo_idnodo
 * @property integer $estacion_idestacion
 * @property string $nombre
 * @property double $distancia
 * @property string $observacion
 * @property integer $periodo_mantenimiento
 * @property integer $estacion_idestaciondos
 * @property integer $nodo_idnododos
 * @property integer $rango1
 * @property integer $rango2
 *
 * @property EstacionFo[] $estacionFos
 * @property Estacion $estacionIdestacion
 * @property Estacion $estacionIdestaciondos
 * @property Nodo $nodoIdnodo
 * @property Nodo $nodoIdnododos
 * @property FibraOpticaCarac[] $fibraOpticaCaracs
 * @property CaracteristicaFo[] $caracteristicaFoIdcaracteristicas
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property MantenimientoPreventivo[] $mantenimientoPreventivos
 */
class FibraOptica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fibra_optica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nodo_idnodo', 'estacion_idestacion', 'periodo_mantenimiento', 'estacion_idestaciondos', 'nodo_idnododos', 'rango1', 'rango2'], 'integer'],
            [['nombre'], 'required'],
            [['distancia'], 'number'],
            [['nombre'], 'string', 'max' => 20],
            [['observacion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfibra_optica' => 'Idfibra Optica',
            'nodo_idnodo' => 'Nodo Idnodo',
            'estacion_idestacion' => 'Estacion Idestacion',
            'nombre' => 'Nombre',
            'distancia' => 'Distancia',
            'observacion' => 'Observacion',
            'periodo_mantenimiento' => 'Periodo Mantenimiento',
            'estacion_idestaciondos' => 'Estacion Idestaciondos',
            'nodo_idnododos' => 'Nodo Idnododos',
            'rango1' => 'Rango1',
            'rango2' => 'Rango2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionFos()
    {
        return $this->hasMany(EstacionFo::className(), ['fibra_optica_idfibra_optica' => 'idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionIdestacion()
    {
        return $this->hasOne(Estacion::className(), ['idestacion' => 'estacion_idestacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacionIdestaciondos()
    {
        return $this->hasOne(Estacion::className(), ['idestacion' => 'estacion_idestaciondos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodoIdnodo()
    {
        return $this->hasOne(Nodo::className(), ['idnodo' => 'nodo_idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodoIdnododos()
    {
        return $this->hasOne(Nodo::className(), ['idnodo' => 'nodo_idnododos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticaCaracs()
    {
        return $this->hasMany(FibraOpticaCarac::className(), ['fibra_optica_idfibra_optica' => 'idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaFoIdcaracteristicas()
    {
        return $this->hasMany(CaracteristicaFo::className(), ['idcaracteristica_fo' => 'caracteristica_fo_idcaracteristica'])->viaTable('fibra_optica_carac', ['fibra_optica_idfibra_optica' => 'idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManteCorrectivos()
    {
        return $this->hasMany(ManteCorrectivo::className(), ['fibra_optica_idfibra_optica' => 'idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientoPreventivos()
    {
        return $this->hasMany(MantenimientoPreventivo::className(), ['fibra_optica_idfibra_optica' => 'idfibra_optica']);
    }
}
