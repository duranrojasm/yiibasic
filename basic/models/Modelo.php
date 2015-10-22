<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modelo".
 *
 * @property integer $idmodelo
 * @property string $nombre
 * @property string $tipo
 * @property string $descripcion
 *
 * @property Radio[] $radios
 */
class Modelo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modelo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 30],
            [['tipo'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmodelo' => 'Idmodelo',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadios()
    {
        return $this->hasMany(Radio::className(), ['modelo_idmodelo' => 'idmodelo']);
    }
}
