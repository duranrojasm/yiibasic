<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $idcliente
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $edificio
 * @property string $piso
 *
 * @property EnlaceSatelital[] $enlaceSatelitals
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion'], 'required'],
            [['nombre', 'direccion'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 20],
            [['edificio', 'piso'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcliente' => 'Idcliente',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'edificio' => 'Edificio',
            'piso' => 'Piso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitals()
    {
        return $this->hasMany(EnlaceSatelital::className(), ['cliente_idcliente' => 'idcliente']);
    }
}
