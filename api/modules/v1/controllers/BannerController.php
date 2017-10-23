<?php

namespace api\modules\v1\controllers;

use Yii;

use common\models\mysql\Banner;
/**
* author zhoushuo <z_s106@126.com>
*/
class BannerController extends ApiController
{
	const BANNER = 'banner_image_url';
	
	public $modelClass = 'common\models\mysql\Banner';

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
/*			foreach ($data as $key => &$value) 
			{
				$value['url'] = Yii::$app->params['domain'].$value['url'];
			}*/
			if(Yii::$app->params['cache'] === true)
				Yii::$app->cache->set(self::BANNER,$data);
		}
		return $data;
	}

}