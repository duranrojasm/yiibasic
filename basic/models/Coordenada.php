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
 *
 * @property Estacion[] $estacions
 * @property Nodo[] $nodos
 * @property ReporteFalla[] $reporteFallas
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacions()
    {
        return $this->hasMany(Estacion::className(), ['coordenada_idcoordenada' => 'idcoordenada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodos()
    {
        return $this->hasMany(Nodo::className(), ['coordenada_idcoordenada' => 'idcoordenada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteFallas()
    {
        return $this->hasMany(ReporteFalla::className(), ['coordenada_idcoordenada' => 'idcoordenada']);
    }
}
