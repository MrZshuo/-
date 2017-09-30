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
	        ['file', 'safe'],
	        ['info', 'string', 'max' => 255],
	        [['sort'], 'number'],
	    ]; 
	}

	public function save($type)
	{
		$model = new Banner();
		if(is_array($this->file) && $this->file)
			$this->file = implode(',', $this->file);
		$model->url = $this->file;
		$model->mime = $type;
		$model->info = $this->info;
		$model->sort = $this->sort;
		return $model->save();
	}
}