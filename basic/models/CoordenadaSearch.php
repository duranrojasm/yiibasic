<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coordenada;

/**
 * CoordenadaSearch represents the model behind the search form about `app\models\Coordenada`.
 */
class CoordenadaSearch extends Coordenada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcoordenada'], 'integer'],
            [['latitud', 'longitud'], 'safe'],
            [['asnm'], 'number'],
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
        $query = Coordenada::find();

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
            'idcoordenada' => $this->idcoordenada,
            'asnm' => $this->asnm,
        ]);

        $query->andFilterWhere(['like', 'latitud', $this->latitud])
            ->andFilterWhere(['like', 'longitud', $this->longitud]);

        return $dataProvider;
    }
}
