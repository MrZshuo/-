<?php

namespace common\models\mysql;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\mysql\CategoryDescription;

/**
 * CategoryDescriptionSearch represents the model behind the search form about `common\models\mysql\CategoryDescription`.
 */
class CategoryDescriptionSearch extends CategoryDescription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'language_id'], 'integer'],
            [['show_name'], 'safe'],
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
        $query = CategoryDescription::find();

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
            'category_id' => $this->category_id,
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'show_name', $this->show_name]);

        return $dataProvider;
    }
}
