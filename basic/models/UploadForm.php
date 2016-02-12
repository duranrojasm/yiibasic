<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "permiso".
 *
 * @property integer $idPermiso
 * @property string $Fecha_solicitud
 * @property string $Fecha_inicio
 * @property string $Fecha_fin
 * @property string $Motivo
 * @property string $Universidad_beca
 * @property string $Area_conocimiento_beca
 * @property integer $Persona_idPersona
 * @property integer $Lapso_academico_idLapso_academico
 * @property integer $Tipo_idTipo
 *
 * @property Archivo[] $archivos
 * @property Persona $personaIdPersona
 * @property LapsoAcademico $lapsoAcademicoIdLapsoAcademico
 * @property Tipo $tipoIdTipo
 * @property PermisoEstado[] $permisoEstados
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'maxFiles' => 10], // <--- here!
        ];
    }

    
}
