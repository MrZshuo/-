<?php

namespace common\models\mysql;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\mysql\ContentDescription;

/**
 * ContentDescriptionSearch represents the model behind the search form about `common\models\mysql\ContentDescription`.
 */
class ContentDescriptionSearch extends ContentDescription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'language_id', 'status'], 'integer'],
            [['show_title', 'content_info', 'content'], 'safe'],
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
        $query = ContentDescription::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'content_id' => $this->content_id,
            'language_id' => $this->language_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'show_title', $this->show_title])
            ->andFilterWhere(['like', 'content_info', $this->content_info])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
