<?php

namespace common\models\mysql;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\mysql\Content;

/**
 * ContentSearch represents the model behind the search form about `common\models\mysql\Content`.
 */
class ContentSearch extends Content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nav_id', 'status'], 'integer'],
            [['content_url', 'type', 'create_at', 'update_at', 'author'], 'safe'],
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
        $query = Content::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>[
                'pageSize' => 15,
            ],
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
            'nav_id' => $this->nav_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'content_url', $this->content_url])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
