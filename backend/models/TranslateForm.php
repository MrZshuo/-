<?php
namespace backend\models;

use yii\base\Model;
use common\models\mongodb\Nav();

/**
* author zhoushuo <z_s106@126.com>
*/
class Translate extends Model
{
	
	public $id;
	public $name;
	public $show_name;

	public function rules()
	{
		return [
			['id','integer'],
			[['name','show_name'],'string'];
		];
	}

	public function save()
	{
		$model = new Nav();
		
		$arr = array($model->id,$model->name,$model->show_name);
		$model->
	}
}