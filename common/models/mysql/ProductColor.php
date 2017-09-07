<?php
namespace common\models\mysql;

use Yii;
use yii\db\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class ProductColor extends ActiveRecord
{
	
	public static function tableName()
	{
		return '{{%product_color}}';
	}

	public function rules()
	{
		return [
			['product_id','number'],
			[['name','image_url','image_mime'],'string'],
			[['image_width','image_height'],'number'],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app','ID'),
			'product_id' => Yii::t('app','产品ID'),
			'name' => Yii::t('app','颜色名'),
			'image_url' => Yii::t('app','图片地址'),
			'image_width' => Yii::t('app','图片宽'),
			'image_height' => Yii::t('app','图片高'),
		];
	}


}