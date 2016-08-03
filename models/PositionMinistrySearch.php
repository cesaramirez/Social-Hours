<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PositionMinistry;

/**
 * PositionMinistrySearch represents the model behind the search form about `app\models\PositionMinistry`.
 */
class PositionMinistrySearch extends PositionMinistry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ministry_id', 'position_id', 'member_id'], 'integer'],
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
        $query = PositionMinistry::find();

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
            'ministry_id' => $this->ministry_id,
            'position_id' => $this->position_id,
            'member_id' => $this->member_id,
        ]);

        return $dataProvider;
    }
}
