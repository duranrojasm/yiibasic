<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EquipoGeneralCarac;

/**
 * EquipoGeneralCaracSearch represents the model behind the search form about `app\models\EquipoGeneralCarac`.
 */
class EquipoGeneralCaracSearch extends EquipoGeneralCarac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idequipo_general_carac', 'caractersticas_em_idcaractersticas_em', 'equipo_general_idequipo_general'], 'integer'],
            [['valor'], 'safe'],
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
        $query = EquipoGeneralCarac::find();

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
            'idequipo_general_carac' => $this->idequipo_general_carac,
            'caractersticas_em_idcaractersticas_em' => $this->caractersticas_em_idcaractersticas_em,
            'equipo_general_idequipo_general' => $this->equipo_general_idequipo_general,
        ]);

        $query->andFilterWhere(['like', 'valor', $this->valor]);

        return $dataProvider;
    }
}
