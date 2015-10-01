<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstructurEq;

/**
 * EstructurEqSearch represents the model behind the search form about `app\models\EstructurEq`.
 */
class EstructurEqSearch extends EstructurEq
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['radio_idradio', 'estructura_idestructura'], 'integer'],
            [['fecha', 'observacion'], 'safe'],
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
        $query = EstructurEq::find();

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
            'radio_idradio' => $this->radio_idradio,
            'estructura_idestructura' => $this->estructura_idestructura,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
