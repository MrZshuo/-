<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use common\models\mysql\Nav;
use common\models\mysql\Banner;
/**
* author zhoushuo <z_s106@126.com>
*/
class NavController extends ActiveController
{
	
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

	public function actionIndex($language)
	{
		return [
			'code'=> 200,
			'nav' => $this->getNav($language),
			'banner' => $this->getBanner(),
		];

	}
	/**
	*@param $language 语言ID
	*@return array 对应语言的导航 else error 
	*/
	public function getNav($language)
	{
		$data = Nav::find()->select(['id','name','sort'])->where(['language_id' => $language])->asArray()->all();
		return $data;
	}

	public function getBanner()
	{
		$data = Banner::find()->select(['id','url','sort','info'])->asArray()->all();
		return $data;
	}
}