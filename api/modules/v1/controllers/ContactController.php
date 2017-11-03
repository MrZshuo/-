<?php
namespace api\modules\v1\controllers;

use Yii;

use common\models\mysql\Customer;
use common\models\mysql\Config;
use common\models\mysql\UserRss;
/**
* author zhoushuo <z_s106@126.com>
*/
class ContactController extends ApiController
{
	
	public $modelClass = 'common\models\mysql\Customer';
	const INPUT_INFO = 'input_info';

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

	public function actionInputInfo()
    {
        if(Yii::$app->cache->exists(self::INPUT_INFO) && Yii::$app->params['cache'] === true)
            return Yii::$app->cache->get(self::INPUT_INFO);
        else{
            $data = Config::find()->select(['name'])->where(['status'=>1])->asArray()->all();
            $info = [
                'msg' => 'ok',
                'data' => $data,
            ];
            if(Yii::$app->params['cache'] === true)
                Yii::$app->cache->set(self::INPUT_INFO,$info,Yii::$app->params['expire']);
            return $info;
        }

    }

    public function actionUserRss()
    {
        $model = new UserRss();
        $model->name = Yii::$app->request->post('name');
        $model->email = Yii::$app->request->post('email');

        if($model->save())
            return [
                'msg' => 'ok',
                'data' => $model
            ];
        else
            return [
                'msg' => 'error',
                'message' => '邮箱不能为空'
            ];
    }
}