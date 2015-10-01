<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioEquimedi;

/**
 * UsuarioEquimediSearch represents the model behind the search form about `app\models\UsuarioEquimedi`.
 */
class UsuarioEquimediSearch extends UsuarioEquimedi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipo_general_idequipo_general', 'usuario_idusuario'], 'integer'],
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
        $query = UsuarioEquimedi::find();

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
            'equipo_general_idequipo_general' => $this->equipo_general_idequipo_general,
            'usuario_idusuario' => $this->usuario_idusuario,
        ]);

        return $dataProvider;
    }
}
