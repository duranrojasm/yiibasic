<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idusuario
 * @property integer $estacion_idestacion
 * @property integer $rol_idrol
 * @property string $nombre
 * @property string $apellido
 * @property string $cedula
 * @property string $num_sap
 * @property string $carnet
 * @property string $telefono_cel
 * @property string $telefono_hab
 * @property string $cargo
 * @property string $correo
 * @property string $gerencia_general
 * @property string $gerencia
 * @property string $departamento
 * @property boolean $disponibilidad
 *
 * @property Herramienta[] $herramientas
 * @property Estacion $estacionIdestacion
 * @property Rol $rolIdrol
 * @property UsuarioEquimedi[] $usuarioEquimedis
 * @property EquipoGeneral[] $equipoGeneralIdequipoGenerals
 * @property UsuarioImpSegdad[] $usuarioImpSegdads
 * @property ImplementoSegurd[] $implementoSegurdIdimplementoSegurds
 * @property UsuarioReportef[] $usuarioReportefs
 * @property ReporteFalla[] $reporteFallaIdreporteFallas
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estacion_idestacion', 'rol_idrol', 'nombre', 'apellido', 'cedula', 'num_sap', 'carnet', 'telefono_cel', 'cargo', 'correo'], 'required'],
            [['estacion_idestacion', 'rol_idrol'], 'integer'],
            [['disponibilidad'], 'boolean'],
            [['nombre', 'apellido', 'gerencia_general', 'gerencia', 'departamento'], 'string', 'max' => 30],
            [['cedula', 'num_sap', 'carnet', 'telefono_cel', 'telefono_hab'], 'string', 'max' => 20],
            [['cargo', 'correo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'estacion_idestacion' => 'Estación',
            'rol_idrol' => 'Rol ',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'cedula' => 'Cedula',
            'num_sap' => 'Num Sap',
            'carnet' => 'Carnet',
            'telefono_cel' => 'Telf Celular',
            'telefono_hab' => 'Telf Habit.',
            'cargo' => 'Cargo',
            'correo' => 'Correo',
            'gerencia_general' => 'Gerencia General',
            'gerencia' => 'Gerencia',
            'departamento' => 'Departamento',
            'disponibilidad' => 'Disponibilidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientas()
    {
        return $this->hasMany(Herramienta::className(), ['usuario_idusuario' => 'idusuario']);
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
    public function getRolIdrol()
    {
        return $this->hasOne(Rol::className(), ['idrol' => 'rol_idrol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioEquimedis()
    {
        return $this->hasMany(UsuarioEquimedi::className(), ['usuario_idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipoGeneralIdequipoGenerals()
    {
        return $this->hasMany(EquipoGeneral::className(), ['idequipo_general' => 'equipo_general_idequipo_general'])->viaTable('usuario_equimedi', ['usuario_idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioImpSegdads()
    {
        return $this->hasMany(UsuarioImpSegdad::className(), ['usuario_idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImplementoSegurdIdimplementoSegurds()
    {
        return $this->hasMany(ImplementoSegurd::className(), ['idimplemento_segurd' => 'implemento_segurd_idimplemento_segurd'])->viaTable('usuario_imp_segdad', ['usuario_idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioReportefs()
    {
        return $this->hasMany(UsuarioReportef::className(), ['usuario_idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallaIdreporteFallas()
    {
        return $this->hasMany(ReporteFalla::className(), ['idreporte_falla' => 'reporte_falla_idreporte_falla'])->viaTable('usuario_reportef', ['usuario_idusuario' => 'idusuario']);
    }
}
