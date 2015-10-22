<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partes_es".
 *
 * @property integer $idpartes_es
 * @property integer $enlace_satelital_idenlace_satelital
 * @property string $nombre
 * @property string $serial
 *
 * @property EnlaceSatelital $enlaceSatelitalIdenlaceSatelital
 */
class PartesEs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partes_es';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enlace_satelital_idenlace_satelital'], 'required'],
            [['enlace_satelital_idenlace_satelital'], 'integer'],
            [['nombre'], 'string', 'max' => 20],
            [['serial'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpartes_es' => 'Idpartes Es',
            'enlace_satelital_idenlace_satelital' => 'Enlace Satelital',
            'nombre' => 'Nombre',
            'serial' => 'Serial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitalIdenlaceSatelital()
    {
        return $this->hasOne(EnlaceSatelital::className(), ['idenlace_satelital' => 'enlace_satelital_idenlace_satelital']);
    }
}
