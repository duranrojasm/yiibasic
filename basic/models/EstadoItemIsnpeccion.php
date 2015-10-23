<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_item_isnpeccion".
 *
 * @property integer $inspeccion_idinspeccion
 * @property integer $item_iditem
 * @property string $fecha
 * @property string $descrip_novedades
 * @property string $estado_items
 * @property double $valor_potencia_volt
 * @property string $valor
 *
 * @property Inspeccion $inspeccionIdinspeccion
 * @property Item $itemIditem
 */
class EstadoItemIsnpeccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_item_isnpeccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'item_iditem'], 'required'],
            [['inspeccion_idinspeccion', 'item_iditem'], 'integer'],
            [['fecha'], 'safe'],
            [['valor_potencia_volt'], 'number'],
            [['descrip_novedades'], 'string', 'max' => 30],
            [['estado_items'], 'string', 'max' => 10],
            [['valor'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inspeccion_idinspeccion' => 'Inspeccion Idinspeccion',
            'item_iditem' => 'Item Iditem',
            'fecha' => 'Fecha',
            'descrip_novedades' => 'Descrip Novedades',
            'estado_items' => 'Estado Items',
            'valor_potencia_volt' => 'Valor Potencia Volt',
            'valor' => 'Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspeccionIdinspeccion()
    {
        return $this->hasOne(Inspeccion::className(), ['idinspeccion' => 'inspeccion_idinspeccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemIditem()
    {
        return $this->hasOne(Item::className(), ['iditem' => 'item_iditem']);
    }
}
