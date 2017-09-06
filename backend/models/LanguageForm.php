<?php
namespace backend\models;


use yii\base\Model;

/**
* author zhoushuo <z_s106@126.com>
*/
class LanguageForm extends Model
{
	public $name;
	public $status = 0;

	public function rules()
	{
		return [
			[['name','status'],'required'],
			['name','string','max'=>50],
		];
	}

	public function save()
	{
		$model = new common\models\mysql\Language();
		$model->name = $this->name;
		$model->status = $this->status;
		return $model->save();
	}	

}