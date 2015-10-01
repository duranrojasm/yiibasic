<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nodo;

/**
 * NodoSearch represents the model behind the search form about `app\models\Nodo`.
 */
class NodoSearch extends Nodo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnodo', 'coordenada_idcoordenada', 'estacion_idestacion'], 'integer'],
            [['tipo', 'nombre', 'direccion', 'identificacion', 'contacto_red', 'contacto_mant'], 'safe'],
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
        $query = Nodo::find();

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
            'idnodo' => $this->idnodo,
            'coordenada_idcoordenada' => $this->coordenada_idcoordenada,
            'estacion_idestacion' => $this->estacion_idestacion,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'contacto_red', $this->contacto_red])
            ->andFilterWhere(['like', 'contacto_mant', $this->contacto_mant]);

        return $dataProvider;
    }
}
