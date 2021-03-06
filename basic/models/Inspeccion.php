<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspeccion".
 *
 * @property integer $idinspeccion
 * @property integer $nodo_idnodo
 * @property integer $estacion_idestacion
 * @property string $descripcion
 * @property string $ptos_referencia
 * @property string $fecha_asig
 * @property string $fecha_insp
 * @property string $estatus
 * @property integer $radio_idradio
 * @property integer $multimedia_idmultimedia
 *
 * @property EstadoItemIsnpeccion[] $estadoItemIsnpeccions
 * @property Item[] $itemIditems
 * @property Estacion $estacionIdestacion
 * @property Multimedia $multimediaIdmultimedia
 * @property Nodo $nodoIdnodo
 * @property Radio $radioIdradio
 * @property Multimedia[] $multimedia
 * @property UsuarioInspeccion[] $usuarioInspeccions
 * @property Usuario[] $usuarioIdusuarios
 */
class Inspeccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inspeccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['nodo_idnodo', 'estacion_idestacion', 'radio_idradio', 'multimedia_idmultimedia'], 'integer'],
            [['descripcion', 'fecha_asig', 'fecha_insp'], 'required'],
=======
            [['nodo_idnodo', 'estacion_idestacion', 'radio_idradio'], 'integer'],
>>>>>>> origin/master
            [['fecha_asig', 'fecha_insp'], 'safe'],
            [['descripcion', 'ptos_referencia'], 'string', 'max' => 50],
            [['estatus'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinspeccion' => 'Idinspeccion',
            'nodo_idnodo' => 'Nodo Idnodo',
            'estacion_idestacion' => 'Estacion Idestacion',
            'descripcion' => 'Descripcion',
            'ptos_referencia' => 'Ptos Referencia',
            'fecha_asig' => 'Fecha Asig',
            'fecha_insp' => 'Fecha Insp',
            'estatus' => 'Estatus',
            'radio_idradio' => 'Radio Idradio',
            'multimedia_idmultimedia' => 'Multimedia Idmultimedia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoItemIsnpeccions()
    {
        return $this->hasMany(EstadoItemIsnpeccion::className(), ['inspeccion_idinspeccion' => 'idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemIditems()
    {
        return $this->hasMany(Item::className(), ['iditem' => 'item_iditem'])->viaTable('estado_item_isnpeccion', ['inspeccion_idinspeccion' => 'idinspeccion']);
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
    public function getMultimediaIdmultimedia()
    {
        return $this->hasOne(Multimedia::className(), ['idmultimedia' => 'multimedia_idmultimedia']);
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
    public function getRadioIdradio()
    {
        return $this->hasOne(Radio::className(), ['idradio' => 'radio_idradio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultimedia()
    {
        return $this->hasMany(Multimedia::className(), ['inspeccion_idinspeccion' => 'idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioInspeccions()
    {
        return $this->hasMany(UsuarioInspeccion::className(), ['inspeccion_idinspeccion' => 'idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuarios()
    {
        return $this->hasMany(Usuario::className(), ['idusuario' => 'usuario_idusuario'])->viaTable('usuario_inspeccion', ['inspeccion_idinspeccion' => 'idinspeccion']);
    }
}
