<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form about `app\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'veiculo_id'], 'integer'],
            [['data_reserva', 'data_devolucao'], 'safe'],
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
        $query = Reserva::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cliente_id' => $this->cliente_id,
            'veiculo_id' => $this->veiculo_id,
        ]);

        $query->andFilterWhere(['like', 'data_reserva', $this->data_reserva])
            ->andFilterWhere(['like', 'data_devolucao', $this->data_devolucao]);

        return $dataProvider;
    }
}
