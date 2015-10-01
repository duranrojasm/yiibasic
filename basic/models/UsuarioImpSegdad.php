<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_imp_segdad".
 *
 * @property integer $implemento_segurd_idimplemento_segurd
 * @property integer $usuario_idusuario
 * @property string $fecha
 * @property integer $cantidad_req
 * @property integer $cantidad_tiene
 * @property string $observacion
 *
 * @property ImplementoSegurd $implementoSegurdIdimplementoSegurd
 * @property Usuario $usuarioIdusuario
 */
class UsuarioImpSegdad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_imp_segdad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['implemento_segurd_idimplemento_segurd', 'usuario_idusuario'], 'required'],
            [['implemento_segurd_idimplemento_segurd', 'usuario_idusuario', 'cantidad_req', 'cantidad_tiene'], 'integer'],
            [['fecha'], 'safe'],
            [['observacion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'implemento_segurd_idimplemento_segurd' => 'Implemento Segurd Idimplemento Segurd',
            'usuario_idusuario' => 'Usuario Idusuario',
            'fecha' => 'Fecha',
            'cantidad_req' => 'Cantidad Req',
            'cantidad_tiene' => 'Cantidad Tiene',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImplementoSegurdIdimplementoSegurd()
    {
        return $this->hasOne(ImplementoSegurd::className(), ['idimplemento_segurd' => 'implemento_segurd_idimplemento_segurd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }
}
