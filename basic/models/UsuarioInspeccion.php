<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_inspeccion".
 *
 * @property integer $inspeccion_idinspeccion
 * @property integer $usuario_idusuario
 *
 * @property Inspeccion $inspeccionIdinspeccion
 * @property Usuario $usuarioIdusuario
 */
class UsuarioInspeccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_inspeccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspeccion_idinspeccion', 'usuario_idusuario'], 'required'],
            [['inspeccion_idinspeccion', 'usuario_idusuario'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inspeccion_idinspeccion' => 'Inspeccion Idinspeccion',
            'usuario_idusuario' => 'Usuario Idusuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspeccionIdinspeccion()
    {
        return $this->hasOne(Inspeccion::className(), ['idinspeccion' => 'inspeccion_idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }
}
