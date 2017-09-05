<?php
namespace common\models\mongodb;

use yii\mongodb\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class Products extends ActiveRecord
{
	
	public function attributes()
	{
		return [
			'_id',
            'name',
            'status',
            'visibility',
            'size',
            'color',
            //'url_path',
            'category',
            'price',
            'description',
            'short_description',
            'custom_option',
            'remark',
            'created_at',
            'updated_at',
		];
	}

}