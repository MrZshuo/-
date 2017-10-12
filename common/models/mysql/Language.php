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
			[['language_name','status','language_short_name'],'required'],
			['language_name','string','max'=>20],
			['language_short_name','string','max'=>5],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app','ID'),
			'language_name' => Yii::t('app','语言名称'),
			'language_short_name' => Yii::t('app','简写'),
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
		return self::find()->select(['language_name','id'])->indexBy('id')->column();
	}

	public static function getIdByShortName($shortname)
	{
		$res = self::find()->select(['id','language_name'])->where(['language_short_name'=>$shortname,'status'=>1])->one();
		return $res->id;
	}
}