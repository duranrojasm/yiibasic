<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "multimedia".
 *
 * @property integer $idmultimedia
 * @property integer $detalle_proyecto_iddetalle_proyecto
 * @property integer $inspeccion_idinspeccion
 * @property integer $estacion_idestacion
 * @property integer $nodo_idnodo
 * @property string $multimedia
 *
 * @property DetalleProyecto $detalleProyectoIddetalleProyecto
 * @property Estacion $estacionIdestacion
 * @property Inspeccion $inspeccionIdinspeccion
 * @property Nodo $nodoIdnodo
 */
class Multimedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;
    public static function tableName()
    {
        return 'multimedia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detalle_proyecto_iddetalle_proyecto', 'inspeccion_idinspeccion', 'estacion_idestacion', 'nodo_idnodo'], 'integer'],
            [['image'],'file'],
            [['multimedia'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmultimedia' => 'Idmultimedia',
            'detalle_proyecto_iddetalle_proyecto' => 'Detalle Proyecto Iddetalle Proyecto',
            'inspeccion_idinspeccion' => 'Inspeccion Idinspeccion',
            'estacion_idestacion' => 'Estacion Idestacion',
            'nodo_idnodo' => 'Nodo Idnodo',
            'multimedia' => 'Multimedia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProyectoIddetalleProyecto()
    {
        return $this->hasOne(DetalleProyecto::className(), ['iddetalle_proyecto' => 'detalle_proyecto_iddetalle_proyecto']);
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
    public function getInspeccionIdinspeccion()
    {
        return $this->hasOne(Inspeccion::className(), ['idinspeccion' => 'inspeccion_idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodoIdnodo()
    {
        return $this->hasOne(Nodo::className(), ['idnodo' => 'nodo_idnodo']);
    }
}
