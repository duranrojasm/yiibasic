<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radio".
 *
 * @property integer $idradio
 * @property integer $modelo_idmodelo
 * @property integer $estacion_idestacion
 * @property string $observaciones
 * @property string $posicion_fisica
 * @property string $nombre
 * @property string $marca
 * @property string $serial
 * @property integer $periodo_mantenimiento
 * @property string $estatus
 * @property string $ubicacion_disp
 * @property integer $estacion_idestaciondos
 *
 * @property EstructurEq[] $estructurEqs
 * @property Estructura[] $estructuraIdestructuras
 * @property Inspeccion[] $inspeccions
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property MantenimientoPreventivo[] $mantenimientoPreventivos
 * @property PartesRadio[] $partesRadios
 * @property Estacion $estacionIdestacion
 * @property Estacion $estacionIdestacion0
 * @property Estacion $estacionIdestaciondos
 * @property Modelo $modeloIdmodelo
 * @property RadioCarac[] $radioCaracs
 * @property Caracteristicasrad[] $caracteristicasradIdcaracteristicas
 */
class Radio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'radio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelo_idmodelo', 'estacion_idestacion', 'nombre', 'marca', 'serial'], 'required'],
            [['modelo_idmodelo', 'estacion_idestacion', 'periodo_mantenimiento', 'estacion_idestaciondos'], 'integer'],
            [['observaciones'], 'string', 'max' => 100],
            [['posicion_fisica'], 'string', 'max' => 40],
            [['nombre', 'serial', 'estatus', 'ubicacion_disp'], 'string', 'max' => 30],
            [['marca'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idradio' => 'Idradio',
            'modelo_idmodelo' => 'Modelo Idmodelo',
            'estacion_idestacion' => 'Estacion Idestacion',
            'observaciones' => 'Observaciones',
            'posicion_fisica' => 'Posicion Fisica',
            'nombre' => 'Nombre',
            'marca' => 'Marca',
            'serial' => 'Serial',
            'periodo_mantenimiento' => 'Periodo Mantenimiento',
            'estatus' => 'Estatus',
            'ubicacion_disp' => 'Ubicacion Disp',
            'estacion_idestaciondos' => 'Estacion Idestaciondos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructurEqs()
    {
        return $this->hasMany(EstructurEq::className(), ['radio_idradio' => 'idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructuraIdestructuras()
    {
        return $this->hasMany(Estructura::className(), ['idestructura' => 'estructura_idestructura'])->viaTable('estructur_eq', ['radio_idradio' => 'idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspeccions()
    {
        return $this->hasMany(Inspeccion::className(), ['radio_idradio' => 'idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManteCorrectivos()
    {
        return $this->hasMany(ManteCorrectivo::className(), ['radio_idradio' => 'idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientoPreventivos()
    {
        return $this->hasMany(MantenimientoPreventivo::className(), ['radio_idradio' => 'idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartesRadios()
    {
        return $this->hasMany(PartesRadio::className(), ['radio_idradio' => 'idradio']);
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
    public function getEstacionIdestacion0()
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
    public function getModeloIdmodelo()
    {
        return $this->hasOne(Modelo::className(), ['idmodelo' => 'modelo_idmodelo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioCaracs()
    {
        return $this->hasMany(RadioCarac::className(), ['radio_idradio' => 'idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicasradIdcaracteristicas()
    {
        return $this->hasMany(Caracteristicasrad::className(), ['idcaracteristicasrad' => 'caracteristicasrad_idcaracteristicas'])->viaTable('radio_carac', ['radio_idradio' => 'idradio']);
    }
}
