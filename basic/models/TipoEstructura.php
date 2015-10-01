<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_estructura".
 *
 * @property integer $idtipo_estructura
 * @property string $nombre
 *
 * @property Estructura[] $estructuras
 */
class TipoEstructura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_estructura';
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
            'idtipo_estructura' => 'Idtipo Estructura',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructuras()
    {
        return $this->hasMany(Estructura::className(), ['tipo_estructura_idtipo_estructura' => 'idtipo_estructura']);
    }
}
