<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte_preven".
 *
 * @property integer $idreporte_preven
 * @property integer $fecha
 *
 * @property DetalleProyecto[] $detalleProyectos
 * @property MantenimientoPreventivo[] $mantenimientoPreventivos
 */
class ReportePreven extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reporte_preven';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idreporte_preven' => 'Idreporte Preven',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProyectos()
    {
        return $this->hasMany(DetalleProyecto::className(), ['reporte_preven_idreporte_preven' => 'idreporte_preven']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientoPreventivos()
    {
        return $this->hasMany(MantenimientoPreventivo::className(), ['reporte_preven_idreporte_preven' => 'idreporte_preven']);
    }
}
