<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fibra_optica_carac".
 *
 * @property integer $caracteristica_fo_idcaracteristica
 * @property integer $hilo_idhilo
 * @property string $valor
 *
 * @property CaracteristicaFo $caracteristicaFoIdcaracteristica
 * @property Hilo $hiloIdhilo
 */
class FibraOpticaCarac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fibra_optica_carac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caracteristica_fo_idcaracteristica', 'hilo_idhilo', 'valor'], 'required'],
            [['caracteristica_fo_idcaracteristica', 'hilo_idhilo'], 'integer'],
            [['valor'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'caracteristica_fo_idcaracteristica' => 'Caracteristica Fo Idcaracteristica',
            'hilo_idhilo' => 'Hilo Idhilo',
            'valor' => 'Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaFoIdcaracteristica()
    {
        return $this->hasOne(CaracteristicaFo::className(), ['idcaracteristica_fo' => 'caracteristica_fo_idcaracteristica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHiloIdhilo()
    {
        return $this->hasOne(Hilo::className(), ['idhilo' => 'hilo_idhilo']);
    }
}
