<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caracteristica_fo".
 *
 * @property integer $idcaracteristica_fo
 * @property string $nombre
 *
 * @property FibraOpticaCarac[] $fibraOpticaCaracs
 * @property FibraOptica[] $fibraOpticaIdfibraOpticas
 */
class CaracteristicaFo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caracteristica_fo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcaracteristica_fo' => 'Idcaracteristica Fo',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticaCaracs()
    {
        return $this->hasMany(FibraOpticaCarac::className(), ['caracteristica_fo_idcaracteristica' => 'idcaracteristica_fo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFibraOpticaIdfibraOpticas()
    {
        return $this->hasMany(FibraOptica::className(), ['idfibra_optica' => 'fibra_optica_idfibra_optica'])->viaTable('fibra_optica_carac', ['caracteristica_fo_idcaracteristica' => 'idcaracteristica_fo']);
    }
}
