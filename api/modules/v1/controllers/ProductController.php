<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use common\models\mysql\Product;
use common\models\mysql\Banner;
/**
* author zhoushuo <z_s106@126.com>
*/
class ProductController extends Controller
{
	
	// public $modelClass = 'common\models\mysql\Nav';

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
			'code'=> 200,
			'info' => $this->getInfo($language = 'en'),
			// 'banner' => $this->getBanner(),
		];

	}
	/**
	*@param $language 语言ID
	*@return array 产品list 
	*/
	public function getInfo($language)
	{
		$data = Product::find()->select(['p.id','p.image_url','d.display_name'])->from('product p')->leftJoin('product_description d','p.id=d.product_id')->where(['d.language_id'=>1,'p.status'=>1])->asArray()->all();
		foreach ($data as $key => &$value) {
			$value['image_url'] = Yii::$app->params['domain'].$value['image_url'];
		}
		return $data;
	}

	public function actionCategory()
	{
		$data = Product::find()->select(['p.id','p.image_url','d.display_name'])->from('product p')->leftJoin('product_description d','p.id=d.product_id')->where(['d.language_id'=>1,'p.category'=>1,'p.status'=>1])->asArray()->all();
	}

	public function actionView($id)
	{
		$data = Product::find()->select(['p.image_url','d.display_name','d.key_words','d.content'])->from('product p')->leftJoin('product_description d','p.id=d.product_id')->where(['d.language_id'=>1,'p.status'=>1,'p.id'=>$id])->asArray()->one();
		$data[0]['image_url'] = Yii::$app->params['domain'].$value['image_url'];

		if(!empty($data))
			return [
				'msg'=>'ok',
				'data'=>$data,
			];
		else
			return [
				'msg'=>'error',
				'message'=>'产品不存在',
			];

	}


}