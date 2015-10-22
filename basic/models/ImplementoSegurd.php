<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "implemento_segurd".
 *
 * @property integer $idimplemento_segurd
 * @property string $nombre
 * @property string $observacion
 *
 * @property UsuarioImpSegdad[] $usuarioImpSegdads
 * @property Usuario[] $usuarioIdusuarios
 */
class ImplementoSegurd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'implemento_segurd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
            [['observacion'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idimplemento_segurd' => 'Idimplemento Segurd',
            'nombre' => 'Nombre',
            'observacion' => 'Observación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioImpSegdads()
    {
        return $this->hasMany(UsuarioImpSegdad::className(), ['implemento_segurd_idimplemento_segurd' => 'idimplemento_segurd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuarios()
    {
        return $this->hasMany(Usuario::className(), ['idusuario' => 'usuario_idusuario'])->viaTable('usuario_imp_segdad', ['implemento_segurd_idimplemento_segurd' => 'idimplemento_segurd']);
    }
}
