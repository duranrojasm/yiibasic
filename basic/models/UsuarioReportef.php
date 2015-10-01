<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_reportef".
 *
 * @property integer $idusuario_reportef
 * @property integer $reporte_falla_idreporte_falla
 * @property integer $usuario_idusuario
 *
 * @property ReporteFalla $reporteFallaIdreporteFalla
 * @property Usuario $usuarioIdusuario
 */
class UsuarioReportef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_reportef';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reporte_falla_idreporte_falla', 'usuario_idusuario'], 'required'],
            [['reporte_falla_idreporte_falla', 'usuario_idusuario'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario_reportef' => 'Idusuario Reportef',
            'reporte_falla_idreporte_falla' => 'Reporte Falla Idreporte Falla',
            'usuario_idusuario' => 'Usuario Idusuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallaIdreporteFalla()
    {
        return $this->hasOne(ReporteFalla::className(), ['idreporte_falla' => 'reporte_falla_idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }
}
