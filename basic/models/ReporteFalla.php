<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte_falla".
 *
 * @property integer $idreporte_falla
 * @property integer $coordenada_idcoordenada
 * @property integer $falla_idfalla
 * @property string $descripcion
 * @property string $ptos_referencia
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $estatus
 * @property double $distancia
 * @property string $urgencia
 *
 * @property DetalleProyecto[] $detalleProyectos
 * @property ManteCorrectivo[] $manteCorrectivos
 * @property RecursoFalla[] $recursoFallas
 * @property Coordenada $coordenadaIdcoordenada
 * @property Falla $fallaIdfalla
 * @property UsuarioReportef[] $usuarioReportefs
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
            [['coordenada_idcoordenada', 'falla_idfalla', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estatus', 'urgencia'], 'required'],
            [['coordenada_idcoordenada', 'falla_idfalla'], 'integer'],
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
            'coordenada_idcoordenada' => 'Coordenada Idcoordenada',
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
    public function getCoordenadaIdcoordenada()
    {
        return $this->hasOne(Coordenada::className(), ['idcoordenada' => 'coordenada_idcoordenada']);
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
}
