<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Packages;

/**
 * PackagesSearch represents the model behind the search form of `app\models\Packages`.
 */
class PackagesSearch extends Packages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'rating', 'id_hotel', 'id_airportstart', 'id_airportend'], 'integer'],
            [['title', 'description', 'flightstart', 'flightend', 'flightbackstart', 'flightbackend'], 'safe'],
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
        $query = Packages::find();

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
            'price' => $this->price,
            'rating' => $this->rating,
            'flightstart' => $this->flightstart,
            'flightend' => $this->flightend,
            'flightbackstart' => $this->flightbackstart,
            'flightbackend' => $this->flightbackend,
            'id_hotel' => $this->id_hotel,
            'id_airportstart' => $this->id_airportstart,
            'id_airportend' => $this->id_airportend,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
