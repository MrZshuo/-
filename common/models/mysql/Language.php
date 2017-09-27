<?php
namespace common\models\mysql;

use Yii;
use yii\db\ActiveRecord;

/**
* author zhoushuo <z_s106@126.com>
*/
class Language extends ActiveRecord
{

	
	public static function tableName()
	{
		return '{{%language}}';
	}

	public function rules()
	{
		return [
			[['name','status','short'],'required'],
			['name','string','max'=>255],
			['short','string','max'=>5],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','语言'),
			'short' => Yii::t('app','简写'),
			'status' => Yii::t('app','状态'),
		];
	}

/*	public function beforeSave($insert)
	{
		if(parent::beforeSave($insert))
			if(!$this->status)
				$this->status = 0;   //设置语言默认不支持
	}*/
//获取所有语言
	public static function getLanguageMap()
	{
		return self::find()->select(['name','id'])->indexBy('id')->column();
	}
}