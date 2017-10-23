<?php

namespace api\modules\v1\controllers;

use Yii;

use common\models\mysql\Language;
/**
* author zhoushuo <z_s106@126.com>
*/
class LanguageController extends ApiController
{
	const LANGUAGE = 'language_id_name';
	
	public $modelClass = 'common\models\mysql\Language';

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