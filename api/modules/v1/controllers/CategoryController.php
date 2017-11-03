<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\data\DataProvider;

use common\models\mysql\Category;
use common\models\mysql\CategoryDescription;
use common\models\mysql\Language;

/**
* author zhoushuo <z_s106@126.com>
*/
class CategoryController extends ApiController
{
	const CATEGORY = 'category_name_';
	public $modelClass = 'common\models\mysql\Category';

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
			if(!empty($lang) && $lang !== 'en')
			{
				$language_id = Language::getIdByShortName($lang);
				$data = CategoryDescription::find()->select(['c.id','d.show_name as name','c.pid'])->from('category_description d')
                    ->leftJoin('category c','c.id=d.category_id')->where(['and','d.language_id'=>$language_id,'c.status'=>1])
                    ->orderBy('sort ASC')->asArray()->all();
				if(empty($data))
					return [
						'msg' => 'error',
						'code' => 501,
						'message' => '当前语言分类不存在',
					];
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
			if(Yii::$app->params['cache'] === true)
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