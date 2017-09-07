<?php
namespace backend\models;

use yii\base\Model;

/**
* author zhoushuo
*/
class BannerForm extends Model
{
	
	public $file;
	public $name;
	public $files;
	public $url;
	public $sort;

	public function fules()
	{
	    return [
		    // [['file','files'], 'required'],
	    	['name','string','max' => 50],
	        [['file', 'files'], 'safe'],
	        [['file'], 'string', 'max' => 255],
	        [['sort'], 'number'],
	    ]; 
	}

	public function save()
	{
		$model = new Banner();
		$model->url = $this->url;
		$model->sort = $this->sort;
		return $model->save();
	}
}