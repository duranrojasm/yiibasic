<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_equimedi".
 *
 * @property integer $idusuario_equimedi
 * @property integer $equipo_general_idequipo_general
 * @property integer $usuario_idusuario
 *
 * @property EquipoGeneral $equipoGeneralIdequipoGeneral
 * @property Usuario $usuarioIdusuario
 */
class UsuarioEquimedi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_equimedi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipo_general_idequipo_general', 'usuario_idusuario'], 'required'],
            [['equipo_general_idequipo_general', 'usuario_idusuario'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario_equimedi' => 'Idusuario Equimedi',
            'equipo_general_idequipo_general' => 'Equipo General Idequipo General',
            'usuario_idusuario' => 'Usuario Idusuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipoGeneralIdequipoGeneral()
    {
        return $this->hasOne(EquipoGeneral::className(), ['idequipo_general' => 'equipo_general_idequipo_general']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }
}
