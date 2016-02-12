<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estructura".
 *
 * @property integer $idestructura
 * @property integer $estacion_idestacion
 * @property integer $tipo_estructura_idtipo_estructura
 * @property string $codigo
 * @property string $nombre
 * @property integer $cantidad
 * @property string $observacion
 * @property integer $estructura_idestructura
 *
 * @property EstructurEq[] $estructurEqs
 * @property Radio[] $radioIdradios
 * @property Estacion $estacionIdestacion
 * @property Estructura $estructuraIdestructura
 * @property Estructura[] $estructuras
 * @property TipoEstructura $tipoEstructuraIdtipoEstructura
 */
class Estructura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estructura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estacion_idestacion', 'tipo_estructura_idtipo_estructura', 'codigo'], 'required'],
             [['estructura_idestructura'], 'default', 'value' => null],
            [['estacion_idestacion', 'tipo_estructura_idtipo_estructura', 'cantidad', 'estructura_idestructura'], 'integer'],

            [['codigo', 'nombre'], 'string', 'max' => 30],
            [['observacion'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestructura' => 'Idestructura',
            'estacion_idestacion' => 'Estacion Idestacion',
            'tipo_estructura_idtipo_estructura' => 'Tipo Estructura Idtipo Estructura',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'cantidad' => 'Cantidad',
            'observacion' => 'Observacion',
            'estructura_idestructura' => 'Estructura Idestructura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructurEqs()
    {
        return $this->hasMany(EstructurEq::className(), ['estructura_idestructura' => 'idestructura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioIdradios()
    {
        return $this->hasMany(Radio::className(), ['idradio' => 'radio_idradio'])->viaTable('estructur_eq', ['estructura_idestructura' => 'idestructura']);
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
    public function getEstructuraIdestructura()
    {
        return $this->hasOne(Estructura::className(), ['idestructura' => 'estructura_idestructura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructuras()
    {
        return $this->hasMany(Estructura::className(), ['estructura_idestructura' => 'idestructura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEstructuraIdtipoEstructura()
    {
        return $this->hasOne(TipoEstructura::className(), ['idtipo_estructura' => 'tipo_estructura_idtipo_estructura']);
    }
}
