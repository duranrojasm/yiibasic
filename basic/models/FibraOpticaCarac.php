<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fibra_optica_carac".
 *
 * @property integer $caracteristica_fo_idcaracteristica
 * @property integer $fibra_optica_idfibra_optica
 * @property string $valor
 *
 * @property CaracteristicaFo $caracteristicaFoIdcaracteristica
 * @property FibraOptica $fibraOpticaIdfibraOptica
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
            [['caracteristica_fo_idcaracteristica', 'valor'], 'required'],
            [['caracteristica_fo_idcaracteristica', 'fibra_optica_idfibra_optica'], 'integer'],
            [['valor'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'caracteristica_fo_idcaracteristica' => 'Datos',
            'fibra_optica_idfibra_optica' => 'Fibra Optica Idfibra Optica',
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
    public function getFibraOpticaIdfibraOptica()
    {
        return $this->hasOne(FibraOptica::className(), ['idfibra_optica' => 'fibra_optica_idfibra_optica']);
    }
}
