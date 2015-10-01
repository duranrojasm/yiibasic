<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "herramienta".
 *
 * @property integer $idherramienta
 * @property integer $usuario_idusuario
 * @property string $nombre
 * @property string $uso
 *
 * @property Usuario $usuarioIdusuario
 */
class Herramienta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'herramienta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_idusuario'], 'required'],
            [['usuario_idusuario'], 'integer'],
            [['nombre'], 'string', 'max' => 20],
            [['uso'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idherramienta' => 'Idherramienta',
            'usuario_idusuario' => 'Usuario Idusuario',
            'nombre' => 'Nombre',
            'uso' => 'Uso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }
}
