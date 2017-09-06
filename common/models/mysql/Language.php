<?php
namespace common\models\mysql;

use yii\db\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class Language extends ActiveRecord
{
	public $name;
	public $status = 0;
	
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
}