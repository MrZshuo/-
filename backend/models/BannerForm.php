<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use \common\models\mysql\Banner;

/**
* author zhoushuo <z_s106@126.com>
*/
class BannerForm extends Model
{
	
	public $file = '';
	public $name;
	public $info = '';
	public $files = '';
	public $sort = 0;

	public function rules()
	{
	    return [
		    // [['file','files'], 'required'],
	    	// ['name','string','max' => 50],
	        // [['file', 'files'], 'safe'],
	        [['file','info'], 'string', 'max' => 255],
	        [['sort'], 'number'],
	    ]; 
	}

	public function save($type)
	{
		$model = new Banner();
		$model->url = $this->file;
		$model->mime = $type;
		$model->info = $this->info;
		$model->sort = $this->sort;
		return $model->save();
	}
}