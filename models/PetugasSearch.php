<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Petugas;

/**
 * PetugasSearch represents the model behind the search form of `app\models\Petugas`.
 */
class PetugasSearch extends Petugas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_petugas'], 'integer'],
            [['nama_petugas', 'alamat_petugas', 'jam_jaga'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Petugas::find();

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
            'id_petugas' => $this->id_petugas,
        ]);

        $query->andFilterWhere(['like', 'nama_petugas', $this->nama_petugas])
            ->andFilterWhere(['like', 'alamat_petugas', $this->alamat_petugas])
            ->andFilterWhere(['like', 'jam_jaga', $this->jam_jaga]);

        return $dataProvider;
    }
}
