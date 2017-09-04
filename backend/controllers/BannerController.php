<?php
namespace backend\controllers;

use Yii;
use yii\web\Response;

use common\models\mongodb\Carousel;

use backend\models\BannerForm;
use backend\models\Upload;
/**
* author zhoushuo <z_s106@126.com>
*/
class BannerController extends MyController
{
	

	public function actionCreate()
	{
		$model = new BannerForm();
		return $this->render('create',['model'=>$model]);
	}

	public function actionUpload()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;
		$model = new Upload();
		$info = $model->upImage();
		if($info && is_array($info))
		{
			return $info;
		}
		else
			return ['code' => 1,'msg' => 'error'];
	}

	public function saveBanner($info)
	{
		$model = new common\models\mongodb\Banner();
		$model->url = $info('url');
		$model->
	}
}