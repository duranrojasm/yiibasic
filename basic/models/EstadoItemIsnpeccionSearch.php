<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoItemIsnpeccion;

/**
 * EstadoItemIsnpeccionSearch represents the model behind the search form about `app\models\EstadoItemIsnpeccion`.
 */
class EstadoItemIsnpeccionSearch extends EstadoItemIsnpeccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspeccion_idinspeccion', 'item_iditem'], 'integer'],
            [['fecha', 'descrip_novedades', 'estado_items', 'valor'], 'safe'],
            [['valor_potencia_volt'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EstadoItemIsnpeccion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'inspeccion_idinspeccion' => $this->inspeccion_idinspeccion,
            'item_iditem' => $this->item_iditem,
            'fecha' => $this->fecha,
            'valor_potencia_volt' => $this->valor_potencia_volt,
        ]);

        $query->andFilterWhere(['like', 'descrip_novedades', $this->descrip_novedades])
            ->andFilterWhere(['like', 'estado_items', $this->estado_items])
            ->andFilterWhere(['like', 'valor', $this->valor]);

        return $dataProvider;
    }
}
