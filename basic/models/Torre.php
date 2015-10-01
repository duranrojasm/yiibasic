<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "torre".
 *
 * @property integer $idtorre
 * @property string $codigo
 * @property double $altura
 * @property string $tipo
 *
 * @property EnlaceSatelital[] $enlaceSatelitals
 */
class Torre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'torre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['altura'], 'number'],
            [['codigo', 'tipo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtorre' => 'Idtorre',
            'codigo' => 'Codigo',
            'altura' => 'Altura',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceSatelitals()
    {
        return $this->hasMany(EnlaceSatelital::className(), ['torre_idtorre' => 'idtorre']);
    }
}
