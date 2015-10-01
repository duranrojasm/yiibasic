<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioImpSegdad;

/**
 * UsuarioImpSegdadSearch represents the model behind the search form about `app\models\UsuarioImpSegdad`.
 */
class UsuarioImpSegdadSearch extends UsuarioImpSegdad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['implemento_segurd_idimplemento_segurd', 'usuario_idusuario', 'cantidad_req', 'cantidad_tiene'], 'integer'],
            [['fecha', 'observacion'], 'safe'],
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
        $query = UsuarioImpSegdad::find();

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
            'implemento_segurd_idimplemento_segurd' => $this->implemento_segurd_idimplemento_segurd,
            'usuario_idusuario' => $this->usuario_idusuario,
            'fecha' => $this->fecha,
            'cantidad_req' => $this->cantidad_req,
            'cantidad_tiene' => $this->cantidad_tiene,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
