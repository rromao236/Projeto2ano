<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;
use app\models\Userspackages;

/**
 * UserspackagesSearch represents the model behind the search form of `app\models\Userspackages`.
 */
class UserspackagesSearch extends Userspackages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_package', 'referencia', 'entity', 'usedpoints', 'nrpeople'], 'integer'],
            [['purchasedate', 'estado'], 'safe'],
            [['price'], 'number'],
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
        $query = Userspackages::find();
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
            'id_user' => $this->id_user,
            'id_package' => $this->id_package,
            'purchasedate' => $this->purchasedate,
            'referencia' => $this->referencia,
            'price' => $this->price,
            'entity' => $this->entity,
            'usedpoints' => $this->usedpoints,
            'nrpeople' => $this->nrpeople,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
