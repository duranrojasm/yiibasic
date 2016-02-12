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
        
            [['fecha', 'observacion','radio_idradio', 'estructura_idestructura'], 'safe'],
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

        $query->joinWith('radioIdradio')->joinWith('estructuraIdestructura');

        $query->andFilterWhere([
          
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'estructur_eq.observacion', $this->observacion])
        ->andFilterWhere(['like', 'radio.nombre',  $this->radio_idradio])
        ->andFilterWhere(['like', 'estructura.nombre',  $this->estructura_idestructura]);

        return $dataProvider;
    }
}
