<?php

namespace common\models\mysql;

/**
 * This is the ActiveQuery class for [[Product]].
 *
 * @see Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function search($params)
    {
        $query = Product::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // $this->load($params, '');

        if (!$this->load($params) && !$this->validate()) {
            /* uncomment the following line if you do not want 
            to return any records when validation fails*/
            // $query->where('0=1');
            return $dataProvider;
        }

        //过滤发生在此处
        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
            // '' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        return $dataProvider;
    }
}
