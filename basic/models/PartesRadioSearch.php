<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PartesRadio;

/**
 * PartesRadioSearch represents the model behind the search form about `app\models\PartesRadio`.
 */
class PartesRadioSearch extends PartesRadio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpartes_radio', 'radio_idradio'], 'integer'],
            [['codigo', 'nombre'], 'safe'],
            [['capacidad'], 'number'],
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
        $query = PartesRadio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=> isset(Yii::$app->params['defaultPageSize']) ? Yii::$app->params['defaultPageSize'] : 10,],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idpartes_radio' => $this->idpartes_radio,
            'radio_idradio' => $this->radio_idradio,
            'capacidad' => $this->capacidad,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
