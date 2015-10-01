<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caracteristicasrad".
 *
 * @property integer $idcaracteristicasrad
 * @property string $nombre
 * @property string $tipo
 *
 * @property RadioCarac[] $radioCaracs
 */
class Caracteristicasrad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caracteristicasrad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo'], 'required'],
            [['nombre', 'tipo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcaracteristicasrad' => 'Idcaracteristicasrad',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioCaracs()
    {
        return $this->hasMany(RadioCarac::className(), ['caracteristicasrad_idcaracteristicas' => 'idcaracteristicasrad']);
    }
}
