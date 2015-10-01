<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $iditem
 * @property string $nombre
 * @property string $tipo
 *
 * @property EstadoItemIsnpeccion[] $estadoItemIsnpeccions
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 30],
            [['tipo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iditem' => 'Iditem',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoItemIsnpeccions()
    {
        return $this->hasMany(EstadoItemIsnpeccion::className(), ['item_iditem' => 'iditem']);
    }
}
