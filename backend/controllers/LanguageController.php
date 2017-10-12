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
			'query' => Language::find(),
			'pagination' => [
				'pageSize' => 10,
			],
			'sort' => [
				'defaultOrder' => ['status'=> SORT_DESC], 
			],
		]);
		// $model = $query->getModels();
		return $this->render('index',['dataProvider' => $dataProvider]);
	}

	public function actionCreate()
	{
		$model = new Language();
		if($model->load(Yii::$app->request->post()) && $model->save())
			return $this->redirect(['index']);
		else
			return $this->render('create',['model'=>$model]);
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if($model->load(Yii::$app->request->post()) && $model->save())
			return $this->redirect(['index']);
		else
			return $this->render('update',['model'=>$model]);
	}

	/**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		if(Yii::$app->user->identity->role == '超级管理员')
			$model->delete();
		else
		{
			$model->status = -1;
			$model->save();
		}
		return $this->redirect(['index']);
	}

	public function findModel($id)
	{
		if(($model = Language::findOne($id)) !== null)
			return $model;
		else
			throw new NotFoundHttpException("数据不存在");
			
	}
}