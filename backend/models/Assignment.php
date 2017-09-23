<?php
namespace backend\models;

use yii\db\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class Assignment extends ActiveRecord
{
	
	public static function tableName()
	{
		return '{{%auth_assignment}}';
	}

	public static function getUserRole($user_id)
	{
		return self::find()->select(['item_name'])->where(['user_id'=>$user_id])->asArray()->one();
	}
}