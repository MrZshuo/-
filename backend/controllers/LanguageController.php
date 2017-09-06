<?php
namespace backend\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use backend\controllers\MyController;
use common\models\mysql\Language;

/**
* author zhoushuo <z_s106@126.com>
*/
class LanguageController extends MyController
{
	
	public function actionIndex()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Language::find()
		]);
		// $model = $query->getModels();
		return $this->render('index',['dataProvider' => $dataProvider]);
	}

	public function actionCreate()
	{
		$model = new Language();
		if($model->load(Yii::$app->request->post()) && $model->save())
			return $this->redirect('index');
		else
			return $this->render('create',['model'=>$model]);
	}
}