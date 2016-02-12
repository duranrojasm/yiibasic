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
 * @property integer $equipo_general_idequipo_general
 * @property integer $enlace_satelital_idenlace_satelital
 * @property integer $radio_idradio
 * @property integer $fibra_optica_idfibra_optica
 * @property integer $estacion_idestacion
 * @property integer $nodo_idnodo
 *
 * @property Coordenada[] $coordenadas
 * @property DetalleProyecto[] $detalleProyectos
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property RecursoFalla[] $recursoFallas
 * @property EnlaceSatelital $enlaceSatelitalIdenlaceSatelital
 * @property EquipoGeneral $equipoGeneralIdequipoGeneral
 * @property Estacion $estacionIdestacion
 * @property Falla $fallaIdfalla
 * @property FibraOptica $fibraOpticaIdfibraOptica
 * @property Nodo $nodoIdnodo
 * @property Radio $radioIdradio
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
            [['falla_idfalla', 'descripcion', 'fecha_inicio', 'estatus', 'urgencia'], 'required'],
            [['falla_idfalla', 'equipo_general_idequipo_general', 'enlace_satelital_idenlace_satelital', 'radio_idradio', 'fibra_optica_idfibra_optica', 'estacion_idestacion', 'nodo_idnodo','atraso'], 'integer'],
            [['fecha_inicio', 'fecha_fin','fecha_re'], 'safe'],
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
            'descripcion' => 'Descripción',
            'ptos_referencia' => 'Ptos Referencia',
            'fecha_inicio' => 'Fecha Inicial',
            'fecha_fin' => 'Fecha Fin',
            'fecha_re'  => 'Fecha Hecho',
            'atraso' => 'Atraso',
            'estatus' => 'Estatus',
            'distancia' => 'Distancia',
            'urgencia' => 'Urgencia',
            'equipo_general_idequipo_general' => 'Equipo General Idequipo General',
            'enlace_satelital_idenlace_satelital' => 'Enlace Satelital Idenlace Satelital',
            'radio_idradio' => 'Radio Idradio',
            'fibra_optica_idfibra_optica' => 'Fibra Optica Idfibra Optica',
            'estacion_idestacion' => 'Estacion Idestacion',
            'nodo_idnodo' => 'Nodo Idnodo',
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
    public function getEnlaceSatelitalIdenlaceSatelital()
    {
        return $this->hasOne(EnlaceSatelital::className(), ['idenlace_satelital' => 'enlace_satelital_idenlace_satelital']);
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
    public function getEstacionIdestacion()
    {
        return $this->hasOne(Estacion::className(), ['idestacion' => 'estacion_idestacion']);
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
    public function getFibraOpticaIdfibraOptica()
    {
        return $this->hasOne(FibraOptica::className(), ['idfibra_optica' => 'fibra_optica_idfibra_optica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodoIdnodo()
    {
        return $this->hasOne(Nodo::className(), ['idnodo' => 'nodo_idnodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioIdradio()
    {
        return $this->hasOne(Radio::className(), ['idradio' => 'radio_idradio']);
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
