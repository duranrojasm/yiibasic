<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caracteristica_es".
 *
 * @property integer $idcaracteristica_es
 * @property string $nombre
 *
 * @property EnlaceSatelitalCarac[] $enlaceSatelitalCaracs
 */
class CaracteristicaEs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caracteristica_es';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcaracteristica_es' => 'Idcaracteristica Es',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitalCaracs()
    {
        return $this->hasMany(EnlaceSatelitalCarac::className(), ['caracteristica_es_idcaracteristica' => 'idcaracteristica_es']);
    }
}
