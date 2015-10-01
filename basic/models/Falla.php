<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "falla".
 *
 * @property integer $idfalla
 * @property string $nombre
 * @property string $tipo
 *
 * @property ReporteFalla[] $reporteFallas
 */
class Falla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'falla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 30],
            [['tipo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfalla' => 'Idfalla',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallas()
    {
        return $this->hasMany(ReporteFalla::className(), ['falla_idfalla' => 'idfalla']);
    }
}
