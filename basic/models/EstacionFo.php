<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estacion_fo".
 *
 * @property integer $idestacion_fo
 * @property integer $nodo_idnodo
 * @property integer $fibra_optica_idfibra_optica
 * @property integer $estacion_idestacion
 *
 * @property Estacion $estacionIdestacion
 * @property FibraOptica $fibraOpticaIdfibraOptica
 * @property Nodo $nodoIdnodo
 */
class EstacionFo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estacion_fo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nodo_idnodo', 'fibra_optica_idfibra_optica', 'estacion_idestacion'], 'integer'],
            [['fibra_optica_idfibra_optica'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestacion_fo' => 'Idestacion Fo',
            'nodo_idnodo' => 'Nodo Idnodo',
            'fibra_optica_idfibra_optica' => 'Fibra Optica Idfibra Optica',
            'estacion_idestacion' => 'Estacion Idestacion',
        ];
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
    public function getFibraOpticaIdfibraOptica()
    {
        return $this->hasOne(FibraOptica::className(), ['idfibra_optica' => 'fibra_optica_idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodoIdnodo()
    {
        return $this->hasOne(Nodo::className(), ['idnodo' => 'nodo_idnodo']);
    }
}
