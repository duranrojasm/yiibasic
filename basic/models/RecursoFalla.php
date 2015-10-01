<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso_falla".
 *
 * @property integer $idrecurso_falla
 * @property integer $reporte_falla_idreporte_falla
 * @property string $nombre
 * @property integer $cantidad
 *
 * @property ReporteFalla $reporteFallaIdreporteFalla
 */
class RecursoFalla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recurso_falla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reporte_falla_idreporte_falla', 'nombre'], 'required'],
            [['reporte_falla_idreporte_falla', 'cantidad'], 'integer'],
            [['nombre'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrecurso_falla' => 'Idrecurso Falla',
            'reporte_falla_idreporte_falla' => 'Reporte Falla Idreporte Falla',
            'nombre' => 'Nombre',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallaIdreporteFalla()
    {
        return $this->hasOne(ReporteFalla::className(), ['idreporte_falla' => 'reporte_falla_idreporte_falla']);
    }
}
