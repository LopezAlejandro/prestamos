<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestamos;

/**
 * app\models\PrestamosSearch represents the model behind the search form about `app\models\Prestamos`.
 */
 class PrestamosSearch extends Prestamos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prestamos_id', 'extension', 'lectores_id', 'libros_id', 'activo'], 'integer'],
            [['fecha_devolucion'], 'safe'],
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
        $query = Prestamos::find();

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
            'prestamos_id' => $this->prestamos_id,
            'extension' => $this->extension,
            'fecha_devolucion' => $this->fecha_devolucion,
            'lectores_id' => $this->lectores_id,
            'libros_id' => $this->libros_id,
            'activo' => $this->activo,
        ]);

        return $dataProvider;
    }
}
