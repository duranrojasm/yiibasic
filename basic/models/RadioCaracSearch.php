<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RadioCarac;

/**
 * RadioCaracSearch represents the model behind the search form about `app\models\RadioCarac`.
 */
class RadioCaracSearch extends RadioCarac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caracteristicasrad_idcaracteristicas', 'radio_idradio', 'inspeccion_idinspeccion'], 'integer'],
            [['valor', 'valorrau'], 'safe'],
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
        $query = RadioCarac::find();

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
            'caracteristicasrad_idcaracteristicas' => $this->caracteristicasrad_idcaracteristicas,
            'radio_idradio' => $this->radio_idradio,
            'inspeccion_idinspeccion' => $this->inspeccion_idinspeccion,
        ]);

        $query->andFilterWhere(['like', 'valor', $this->valor])
            ->andFilterWhere(['like', 'valorrau', $this->valorrau]);

        return $dataProvider;
    }
}
