<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ManteCorrectivo;

/**
 * ManteCorrectivoSearch represents the model behind the search form about `app\models\ManteCorrectivo`.
 */
class ManteCorrectivoSearch extends ManteCorrectivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmante_correctivo', 'reporte_falla_idreporte_falla', 'equipo_general_idequipo_general', 'enlace_satelital_idenlace_satelital', 'radio_idradio', 'fibra_optica_idfibra_optica'], 'integer'],
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
        $query = ManteCorrectivo::find();

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
            'idmante_correctivo' => $this->idmante_correctivo,
            'reporte_falla_idreporte_falla' => $this->reporte_falla_idreporte_falla,
            'equipo_general_idequipo_general' => $this->equipo_general_idequipo_general,
            'enlace_satelital_idenlace_satelital' => $this->enlace_satelital_idenlace_satelital,
            'radio_idradio' => $this->radio_idradio,
            'fibra_optica_idfibra_optica' => $this->fibra_optica_idfibra_optica,
        ]);

        return $dataProvider;
    }
}
