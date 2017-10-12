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
class NavController extends Controller
{
	const NAV = 'nav_name_';
	
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

		return [
			'code'=> 200,
			'lang' => $lang,
			'nav' => $this->getNav($lang),
		];

	}
	/**
	*@param $language 语言ID
	*@return array 对应语言的导航 else error 
	*/
	public function getNav($lang)
	{
		if(Yii::$app->cache->exists(self::NAV.$lang) && Yii::$app->params['cache'] === true)
			$data = json_decode(Yii::$app->cache->get(self::NAV.$lang));
		else
		{
			if($lang !== 'en')
			{
				$language_id = $this->getLangaugeId($lang);
				$data = Nav::find()->select(['n.id','n.name','s.show_name','n.pid'])->from('nav n')->leftJoin('nav_showname s','n.id=s.nav_id')->where(['and','s.language_id'=>$language_id,'n.status'=>1])->orderBy('n.sort ASC')->asArray()->all();

			}
			else
				$data = Nav::find()->select(['id','name','pid'])->where(['status'=>1])->orderBy('sort ASC')->asArray()->all();
			//显示二级子菜单
			foreach ($data as $key => &$value) {
				if($value['pid'] !== 0)
				{
					foreach ($data as &$v) {  				
						if($v['id'] === $value['pid'])
						{
							$v['child'][] = $value;
							unset($data[$key]);
						}
					}
				}
			}
			$data = array_values($data);
			Yii::$app->cache->set(self::NAV.$lang,json_encode($data),60*60*2);
		}
		return $data;
	}
	//获取语言简称对应的id
	private function getLangaugeId($lang)
	{
		$language = Language::find()->select(['id','language_name'])->where(['language_short_name'=>$lang,'status'=>1])->one();
		return $language->id;
	}

	public function getBanner()
	{
		$data = Banner::find()->select(['id','url','sort','info'])->asArray()->all();

		return $data;
	}

}