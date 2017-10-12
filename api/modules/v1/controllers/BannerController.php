<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use common\models\mysql\Banner;
use common\models\mysql\Language;
/**
* author zhoushuo <z_s106@126.com>
*/
class BannerController extends ActiveController
{
	const BANNER = 'banner_image_url';
	
	public $modelClass = 'common\models\mysql\Banner';

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

		return [
			'msg' => 'ok',
			'code'=> 200,
			'banner' => $this->getBanner(),
		];

	}
	/**
	*
	*@return array 图片image_url 
	*/
	public function getBanner()
	{
		if(Yii::$app->cache->exists(self::BANNER) && Yii::$app->params['cache'] === true)
			$data = Yii::$app->cache->get(self::BANNER);
		else
		{
			$data = Banner::find()->select(['url'])->asArray()->all();
			foreach ($data as $key => &$value) 
			{
				$value['url'] = Yii::$app->params['domain'].$value['url'];
			}
			Yii::$app->cache->set(self::BANNER,$data);
		}
		return $data;
	}

}