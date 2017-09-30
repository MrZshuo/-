<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use common\models\mysql\Nav;
use common\models\mysql\Language;
/**
* author zhoushuo <z_s106@126.com>
*/
class NavController extends ActiveController
{
	const NAV = 'nav_id_name';
	
	public $modelClass = 'common\models\mysql\Nav';

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

	public function actionIndex($lang='en')
	{
		if($lang != 'en')
		{
			$lang_id = Language::find()->select('id')->where(['status'=>1]);
		}
		return [
			'code'=> 200,
			'lang' => $lang,
			'nav' => $this->getNav($language = 'en'),
		];

	}
	/**
	*@param $language 语言ID
	*@return array 对应语言的导航 else error 
	*/
	public function getNav($lang = 'en')
	{
		if(Yii::$app->cache->exists(self::NAV))
			$data = json_decode(Yii::$app->cache->get(self::NAV));
		else
		{
			$data = Nav::find()->select(['id','name','pid'])->orderBy('sort ASC')->asArray()->all();
			$res = [];
			//显示二级子菜单
			foreach ($data as $key => &$value) {
				if($value['pid'] !== 0)
				foreach ($data as $k => &$v) {  				
					if($v['id'] === $value['pid'])
					{
						$v['child'][] = $value;
						unset($data[$key]);
					}
				}
			Yii::$app->cache->set(self::NAV,json_encode($data),60*60*2);
			}
		}
		return $data;
	}

	public function getBanner()
	{
		$data = Banner::find()->select(['id','url','sort','info'])->asArray()->all();

		return $data;
	}

}