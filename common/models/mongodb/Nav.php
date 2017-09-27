<?php
namespace common\models\mongodb;

use yii\mongodb\ActiveRecorde;
/**
* author zhoushuo <z_s106@126.com>
*/
class Nav extends ActiveRecorde
{

	public static function collectionName()
	{
		return 'nav';
	}

	public function rules()
	{
		return [
			['name','string'],
		];
	}
	
	public function attributes()
	{
		return ['_id','language'];
	}
}