<?php

namespace common\models\mysql;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\mysql\Article;

/**
 * ArticalSearch represents the model behind the search form about `common\models\mysql\Article`.
 */
class ArticalSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language_id', 'sort', 'status'], 'integer'],
            [['nav_id', 'title', 'author', 'image_url', 'info', 'content', 'create_at', 'update_at'], 'safe'],
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
        $query = Article::find();

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
            'language_id' => $this->language_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'sort' => $this->sort,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nav_id', $this->nav_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'image_url', $this->image_url])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
