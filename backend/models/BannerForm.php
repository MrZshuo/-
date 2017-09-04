<?php
namespace backend\models;

use yii\base\Model;

/**
* author zhoushuo
*/
class BannerForm extends Model
{
	
	public $file;
	public $files;

	public function fules()
	{
	    return [
		    // [['file','files'], 'required'],
	        [['file', 'files'], 'safe'],
	        [['file'], 'string', 'max' => 255],
	    ]; 
	}
}