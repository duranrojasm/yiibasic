<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioReportef;

/**
 * UsuarioReportefSearch represents the model behind the search form about `app\models\UsuarioReportef`.
 */
class UsuarioReportefSearch extends UsuarioReportef
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reporte_falla_idreporte_falla', 'usuario_idusuario'], 'integer'],
            [['cargo'], 'safe'],
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
        $query = UsuarioReportef::find();

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
            'reporte_falla_idreporte_falla' => $this->reporte_falla_idreporte_falla,
            'usuario_idusuario' => $this->usuario_idusuario,
        ]);

        $query->andFilterWhere(['like', 'cargo', $this->cargo]);

        return $dataProvider;
    }
}
