<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioInspeccion;

/**
 * UsuarioInspeccionSearch represents the model behind the search form about `app\models\UsuarioInspeccion`.
 */
class UsuarioInspeccionSearch extends UsuarioInspeccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspeccion_idinspeccion', 'usuario_idusuario'], 'integer'],
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
        $query = UsuarioInspeccion::find();

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
            'inspeccion_idinspeccion' => $this->inspeccion_idinspeccion,
            'usuario_idusuario' => $this->usuario_idusuario,
        ]);

        return $dataProvider;
    }
}
