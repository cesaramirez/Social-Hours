<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Action;

/**
 * ActionSearch represents the model behind the search form about `app\models\Action`.
 */
class ActionSearch extends Action
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'controller_id'], 'integer'],
            [['name', 'friendly_name', 'description'], 'safe'],
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
        $query = Action::find();

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
            'controller_id' => $this->controller_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'friendly_name', $this->friendly_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
