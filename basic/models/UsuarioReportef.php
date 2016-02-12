<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_reportef".
 *
 * @property integer $reporte_falla_idreporte_falla
 * @property integer $usuario_idusuario
 * @property string $cargo
 * @property integer $vehiculo
 *
 * @property ReporteFalla $reporteFallaIdreporteFalla
 * @property Usuario $usuarioIdusuario
 * @property Vehiculo $vehiculo0
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
            [['usuario_idusuario'], 'required'],
            [['reporte_falla_idreporte_falla', 'usuario_idusuario', 'vehiculo'], 'integer'],
            [['cargo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reporte_falla_idreporte_falla' => 'Reporte Falla Idreporte Falla',
            'usuario_idusuario' => 'Personal',
            'cargo' => 'Cargo',
            'vehiculo' => 'Vehiculo',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculo0()
    {
        return $this->hasOne(Vehiculo::className(), ['idvehiculo' => 'vehiculo']);
    }
}
