<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enlace_satelital".
 *
 * @property integer $idenlace_satelital
 * @property integer $torre_idtorre
 * @property integer $cliente_idcliente
 * @property integer $estacion_idestacion
 * @property string $codigo
 * @property string $nombre
 * @property integer $num_antena
 * @property integer $periodo_mantenimiento
 * @property string $estatus
 * @property string $ubicacion_disp
 * @property integer $estacion_idestaciondos
 *
 * @property Cliente $clienteIdcliente
 * @property Estacion $estacionIdestacion
 * @property Estacion $estacionIdestaciondos
 * @property Torre $torreIdtorre
 * @property EnlaceSatelitalCarac[] $enlaceSatelitalCaracs
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property MantenimientoPreventivo[] $mantenimientoPreventivos
 * @property PartesEs[] $partesEs
 */
class EnlaceSatelital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enlace_satelital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['torre_idtorre', 'cliente_idcliente', 'estacion_idestacion'], 'required'],
            [['torre_idtorre', 'cliente_idcliente', 'estacion_idestacion', 'num_antena', 'periodo_mantenimiento', 'estacion_idestaciondos'], 'integer'],
            [['codigo', 'nombre', 'estatus', 'ubicacion_disp'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idenlace_satelital' => 'Idenlace Satelital',
            'torre_idtorre' => 'Torre Idtorre',
            'cliente_idcliente' => 'Cliente Idcliente',
            'estacion_idestacion' => 'Estacion Idestacion',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'num_antena' => 'Num Antena',
            'periodo_mantenimiento' => 'Periodo Mantenimiento',
            'estatus' => 'Estatus',
            'ubicacion_disp' => 'Ubicacion Disp',
            'estacion_idestaciondos' => 'Estacion Idestaciondos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdcliente()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'cliente_idcliente']);
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
    public function getTorreIdtorre()
    {
        return $this->hasOne(Torre::className(), ['idtorre' => 'torre_idtorre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitalCaracs()
    {
        return $this->hasMany(EnlaceSatelitalCarac::className(), ['enlace_satelital_idenlace_satelital' => 'idenlace_satelital']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManteCorrectivos()
    {
        return $this->hasMany(ManteCorrectivo::className(), ['enlace_satelital_idenlace_satelital' => 'idenlace_satelital']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientoPreventivos()
    {
        return $this->hasMany(MantenimientoPreventivo::className(), ['enlace_satelital_idenlace_satelital' => 'idenlace_satelital']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartesEs()
    {
        return $this->hasMany(PartesEs::className(), ['enlace_satelital_idenlace_satelital' => 'idenlace_satelital']);
    }
}
