<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caracteristicasrad;

/**
 * CaracteristicasradSearch represents the model behind the search form about `app\models\Caracteristicasrad`.
 */
class CaracteristicasradSearch extends Caracteristicasrad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcaracteristicasrad'], 'integer'],
            [['nombre', 'tipo', 'rau'], 'safe'],
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
        $query = Caracteristicasrad::find();

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
            'idcaracteristicasrad' => $this->idcaracteristicasrad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'rau', $this->rau]);

        return $dataProvider;
    }
}
