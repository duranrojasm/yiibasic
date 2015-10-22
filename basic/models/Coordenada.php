<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coordenada".
 *
 * @property integer $idcoordenada
 * @property string $latitud
 * @property string $longitud
 * @property double $asnm
 * @property integer $reportefalla
 * @property integer $estacion
 * @property integer $nodo
 *
 * @property Estacion $estacion0
 * @property Nodo $nodo0
 * @property ReporteFalla $reportefalla0
 */
class Coordenada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coordenada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latitud', 'longitud'], 'required'],
            [['asnm'], 'number'],
            [['reportefalla', 'estacion', 'nodo'], 'integer'],
            [['latitud', 'longitud'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcoordenada' => 'Idcoordenada',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'asnm' => 'Asnm',
            'reportefalla' => 'Reportefalla',
            'estacion' => 'Estacion',
            'nodo' => 'Nodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacion0()
    {
        return $this->hasOne(Estacion::className(), ['idestacion' => 'estacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodo0()
    {
        return $this->hasOne(Nodo::className(), ['idnodo' => 'nodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportefalla0()
    {
        return $this->hasOne(ReporteFalla::className(), ['idreporte_falla' => 'reportefalla']);
    }
}
