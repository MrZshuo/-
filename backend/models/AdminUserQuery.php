<?php

namespace backend\models;

use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\Model;
use backend\models\AdminUser;

/**
 * This is the ActiveQuery class for [[AdminUser]].
 *
 * @see AdminUser
 */
class AdminUserQuery extends AdminUser
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/


    public function rules()
    {
        return [
            ['id', 'integer'],
            [['username','email'],'string'],

            //注意，rules方法可以是post类部分字段，也可以是全部字段
        ];
    }

    /**
     * @inheritdoc
     * @return AdminUser[]|array
     */
/*    public function all($db = null)
    {
        return parent::all($db);
    }*/

    /**
     * @inheritdoc
     * @return AdminUser|array|null
     */
/*    public function one($db = null)
    {
        return parent::one($db);
    }*/

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
        $query = AdminUser::find();
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
            'username' => $this->username,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        return $dataProvider;
    }

}
