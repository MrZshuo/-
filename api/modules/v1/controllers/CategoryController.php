<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\DataProvider;

use common\models\mysql\Category;
use common\models\mysql\CategoryDescription;
use common\models\mysql\Language;

/**
* author zhoushuo <z_s106@126.com>
*/
class CategoryController extends ActiveController
{
	const CATEGORY = 'category_name_';
	public $modelClass = 'common\models\mysql\Category';
	
	//注销系统自带的actions
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'],$actions['update'],$actions['create'],$actions['delete'],$actions['view']);
		return $actions;
	}

	public function actionIndex($lang = 'en')
	{

		return [
			'code' => 200,
			'lang' => $lang,
			'category' => $this->getCategory($lang),
		];
	}
	/*
	*@param
	*
	*/
	public function getCategory($lang)
	{
		if(Yii::$app->cache->exists(self::CATEGORY.$lang) && Yii::$app->params['cache'] === true)
			$data = json_decode(Yii::$app->cache->get(self::CATEGORY.$lang));
		else
		{
			if($lang !== 'en')
			{
				$language_id = $this->getLangaugeId($lang);
				$data = Category::find()->select(['c.id','c.name','d.show_name','c.pid'])->from('category c')->leftJoin('category_description d','c.id=d.category_id')->where(['and','d.language_id'=>$language_id,'c.status'=>1])->orderBy('sort ASC')->asArray()->all();
			}
			else
				$data = Category::find()->select(['id','name','pid'])->where(['status'=>1])->orderBy('sort ASC')->asArray()->all();
			foreach ($data as $key => &$value) 
			{
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
			Yii::$app->cache->set(self::CATEGORY.$lang,json_encode($data),60*60*2);
		}
		return $data;
	}

	//获取语言简称对应的id
	private function getLangaugeId($lang)
	{
		$language = Language::find()->select(['id','language_name'])->where(['language_short_name'=>$lang,'status'=>1])->one();
		return $language->id;
	}
}