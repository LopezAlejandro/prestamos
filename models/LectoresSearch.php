<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lectores;

/**
 * app\models\LectoresSearch represents the model behind the search form about `app\models\Lectores`.
 */
 class LectoresSearch extends Lectores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lectores_id', 'tipo_lector_id', 'tipo_documento_id'], 'integer'],
            [['nombre', 'documento', 'direccion', 'telefono', 'mail', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
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
        $query = Lectores::find();

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
            'lectores_id' => $this->lectores_id,
            'tipo_lector_id' => $this->tipo_lector_id,
            'tipo_documento_id' => $this->tipo_documento_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'mail', $this->mail]);

        return $dataProvider;
    }
}
