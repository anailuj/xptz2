<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Veiculo;

/**
 * VeiculoSearch represents the model behind the search form about `app\models\Veiculo`.
 */
class VeiculoSearch extends Veiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'portas', 'ar_condicionado', 'cambio_automatico', 'direcao_hidraulica', 'status'], 'integer'],
            [['placa', 'marca', 'modelo', 'ano_fabricacao', 'ano_modelo', 'chassi'], 'safe'],
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
        $query = Veiculo::find();

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
            'id' => $this->id,
            'ano_fabricacao' => $this->ano_fabricacao,
            'ano_modelo' => $this->ano_modelo,
            'portas' => $this->portas,
            'ar_condicionado' => $this->ar_condicionado,
            'cambio_automatico' => $this->cambio_automatico,
            'direcao_hidraulica' => $this->direcao_hidraulica,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'chassi', $this->chassi]);

        return $dataProvider;
    }
}
