<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enlace_satelital_carac".
 *
 * @property integer $idenlace_satelital_carac
 * @property integer $caracteristica_es_idcaracteristica
 * @property integer $enlace_satelital_idenlace_satelital
 * @property string $valor
 *
 * @property CaracteristicaEs $caracteristicaEsIdcaracteristica
 * @property EnlaceSatelital $enlaceSatelitalIdenlaceSatelital
 */
class EnlaceSatelitalCarac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enlace_satelital_carac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caracteristica_es_idcaracteristica', 'enlace_satelital_idenlace_satelital', 'valor'], 'required'],
            [['caracteristica_es_idcaracteristica', 'enlace_satelital_idenlace_satelital'], 'integer'],
            [['valor'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idenlace_satelital_carac' => 'Idenlace Satelital Carac',
            'caracteristica_es_idcaracteristica' => 'Caracteristica Es Idcaracteristica',
            'enlace_satelital_idenlace_satelital' => 'Enlace Satelital Idenlace Satelital',
            'valor' => 'Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaEsIdcaracteristica()
    {
        return $this->hasOne(CaracteristicaEs::className(), ['idcaracteristica_es' => 'caracteristica_es_idcaracteristica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitalIdenlaceSatelital()
    {
        return $this->hasOne(EnlaceSatelital::className(), ['idenlace_satelital' => 'enlace_satelital_idenlace_satelital']);
    }
}
