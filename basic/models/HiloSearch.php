<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hilo;

/**
 * HiloSearch represents the model behind the search form about `app\models\Hilo`.
 */
class HiloSearch extends Hilo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idhilo', 'numhilo'], 'integer'],
            [['ttodest', 'ab', 'sist', 'band', 'odf', 'observ', 'des_esp', 'fibra_idfibra_optica'], 'safe'],
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
        $query = Hilo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('fibraIdfibraOptica');


        $query->andFilterWhere([
            'idhilo' => $this->idhilo,
           
            
        ]);

        $query->andFilterWhere(['like', 'hilo.ttodest', $this->ttodest])
             ->andFilterWhere(['=', 'hilo.numhilo',$this->numhilo])
            ->andFilterWhere(['like', 'hilo.ab', $this->ab])
            ->andFilterWhere(['like', 'hilo.sist', $this->sist])
            ->andFilterWhere(['like', 'hilo.band', $this->band])
            ->andFilterWhere(['like', 'hilo.odf', $this->odf])
            ->andFilterWhere(['like', 'hilo.observ', $this->observ])
            ->andFilterWhere(['like', 'hilo.des_esp', $this->des_esp])
            ->andFilterWhere(['like', 'fibra_optica.nombre',  $this->fibra_idfibra_optica]);

        return $dataProvider;
    }
}
