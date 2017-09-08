<?php
namespace common\models\mysql;

use yii\db\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class Language extends ActiveRecord
{

	
	public static function tableName()
	{
		return '{{%language}}';
	}

	public function rules()
	{
		return [
			[['name','status'],'required'],
			['name','string','max'=>255]
		];
	}

	public function beforeSave($insert)
	{
		if(parent::beforeSave($insert))
			if($this->status)
				$this->status = 0;   //设置语言默认不支持
	}
}