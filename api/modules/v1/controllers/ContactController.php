<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use common\models\mysql\Customer;
/**
* author zhoushuo <z_s106@126.com>
*/
class ContactController extends ActiveController
{
	
	public $modelClass = 'common\models\mysql\Customer';
	//注销系统自带的实现方法
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'],$actions['update'],$actions['create'],$actions['delete'],$actions['view']);
		return $actions;
	}

	public function actionCreate()
	{
		$model = new Customer();
		$model->firstname = Yii::$app->request->post('firstname');
		$model->lastname = Yii::$app->request->post('lastname');
		$model->email = Yii::$app->request->post('email');
		$model->country = Yii::$app->request->post('country');
		$model->telephone = Yii::$app->request->post('tel');
		$model->address = Yii::$app->request->post('address');
		$model->content = Yii::$app->request->post('content');

		if($model->save())
			return [
				'msg' => 'ok',
				'code' => 200,
			];
		else
			return [
				'msg' => 'error',
				'code' => 500,
			];

	}
}