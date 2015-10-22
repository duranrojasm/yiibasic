<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte_falla".
 *
 * @property integer $idreporte_falla
 * @property integer $falla_idfalla
 * @property string $descripcion
 * @property string $ptos_referencia
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $estatus
 * @property double $distancia
 * @property string $urgencia
 *
 * @property Coordenada[] $coordenadas
 * @property DetalleProyecto[] $detalleProyectos
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property RecursoFalla[] $recursoFallas
 * @property Falla $fallaIdfalla
 * @property UsuarioReportef[] $usuarioReportefs
 * @property Usuario[] $usuarioIdusuarios
 * @property VehiculoReportef[] $vehiculoReportefs
 * @property Vehiculo[] $vehiculoIdvehiculos
 */
class ReporteFalla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reporte_falla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['falla_idfalla', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estatus', 'urgencia'], 'required'],
            [['falla_idfalla'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['distancia'], 'number'],
            [['descripcion', 'ptos_referencia'], 'string', 'max' => 50],
            [['estatus', 'urgencia'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idreporte_falla' => 'Idreporte Falla',
            'falla_idfalla' => 'Falla Idfalla',
            'descripcion' => 'Descripcion',
            'ptos_referencia' => 'Ptos Referencia',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'estatus' => 'Estatus',
            'distancia' => 'Distancia',
            'urgencia' => 'Urgencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenadas()
    {
        return $this->hasMany(Coordenada::className(), ['reportefalla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProyectos()
    {
        return $this->hasMany(DetalleProyecto::className(), ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManteCorrectivos()
    {
        return $this->hasMany(ManteCorrectivo::className(), ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecursoFallas()
    {
        return $this->hasMany(RecursoFalla::className(), ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFallaIdfalla()
    {
        return $this->hasOne(Falla::className(), ['idfalla' => 'falla_idfalla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioReportefs()
    {
        return $this->hasMany(UsuarioReportef::className(), ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuarios()
    {
        return $this->hasMany(Usuario::className(), ['idusuario' => 'usuario_idusuario'])->viaTable('usuario_reportef', ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculoReportefs()
    {
        return $this->hasMany(VehiculoReportef::className(), ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculoIdvehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['idvehiculo' => 'vehiculo_idvehiculo'])->viaTable('vehiculo_reportef', ['reporte_falla_idreporte_falla' => 'idreporte_falla']);
    }
}
