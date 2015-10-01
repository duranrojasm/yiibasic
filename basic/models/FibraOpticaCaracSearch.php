<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FibraOpticaCarac;

/**
 * FibraOpticaCaracSearch represents the model behind the search form about `app\models\FibraOpticaCarac`.
 */
class FibraOpticaCaracSearch extends FibraOpticaCarac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caracteristica_fo_idcaracteristica', 'fibra_optica_idfibra_optica'], 'integer'],
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
        $query = FibraOpticaCarac::find();

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
            'caracteristica_fo_idcaracteristica' => $this->caracteristica_fo_idcaracteristica,
            'fibra_optica_idfibra_optica' => $this->fibra_optica_idfibra_optica,
        ]);

        $query->andFilterWhere(['like', 'valor', $this->valor]);

        return $dataProvider;
    }
}
