<?php
namespace api\modules\v1\controllers;

use Yii;

use common\models\mysql\Customer;
/**
* author zhoushuo <z_s106@126.com>
*/
class ContactController extends ApiController
{
	
	public $modelClass = 'common\models\mysql\Customer';

	public function actionCreate()
    {
		$model = new Customer();
		$model->firstname = Yii::$app->request->post('firstname');
		$model->lastname = Yii::$app->request->post('lastname');
		$model->email = Yii::$app->request->post('email');
		$model->country = Yii::$app->request->post('country');
		$model->telephone = Yii::$app->request->post('telephone');
		$model->address = Yii::$app->request->post('address');
		$model->content = Yii::$app->request->post('content');

		if($model->save())
			return [
				'msg' => 'ok',
				'code' => 200,
                'data' => $model
			];
		else
			return [
				'msg' => 'error',
				'code' => 500,
                'data' => $model
			];

	}
}