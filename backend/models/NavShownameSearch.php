<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\mysql\NavShowname;

/**
 * NavShownameSearch represents the model behind the search form about `common\models\mysql\NavShowname`.
 */
class NavShownameSearch extends NavShowname
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nav_id', 'language_id'], 'integer'],
            [['nav_name'], 'safe'],
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
        $query = NavShowname::find();

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
            'nav_id' => $this->nav_id,
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'nav_name', $this->nav_name]);

        return $dataProvider;
    }
}
