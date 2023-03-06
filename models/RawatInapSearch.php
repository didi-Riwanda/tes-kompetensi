<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RawatInap;

/**
 * RawatInapSearch represents the model behind the search form of `app\models\RawatInap`.
 */
class RawatInapSearch extends RawatInap
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rawat_inap', 'id_ruang', 'id_pasien'], 'integer'],
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
        $query = RawatInap::find();

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
            'id_rawat_inap' => $this->id_rawat_inap,
            'id_ruang' => $this->id_ruang,
            'id_pasien' => $this->id_pasien,
        ]);

        return $dataProvider;
    }
}
