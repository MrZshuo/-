<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use common\models\mysql\Language;
/**
* author zhoushuo <z_s106@126.com>
*/
class LanguageController extends ActiveController
{
	const LANGUAGE = 'language_id_name';
	
	public $modelClass = 'common\models\mysql\Language';

/*	public $serializer = [
		'class' => 'yii\rest\Serializer',
		// 'collectionEnvelope' => 'items',
	],*/
	//注销系统自带的实现方法
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'],$actions['update'],$actions['create'],$actions['delete'],$actions['view']);
		return $actions;
	}

	public function actionIndex()
	{
		if(Yii::$app->cache->exists(self::LANGUAGE))
		{
			$data = json_decode(Yii::$app->cache->get(self::LANGUAGE));
		}
		else
		{
			$data = Language::find()->select(['id','language_name','language_short_name'])->where(['status'=>1])->asArray()->all();
			Yii::$app->cache->set(self::LANGUAGE,json_encode($data),60*60*2);
		}
		return [
			'msg' => 'ok',
			'code'=> 200,
			'language' => $data,
		];

	}

}