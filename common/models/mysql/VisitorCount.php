<?php
namespace common\models\mysql;

use yii\db\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class VisitorCount extends ActiveRecord
{

	
	public static function tableName()
	{
		return '{{%visitor_count}}';
	}

	public function rules()
	{
		return [
			[['day','week','month','total'],'number'],
		];
	}
}
