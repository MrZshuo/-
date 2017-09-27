<?php
namespace backend\controllers;

use Yii;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use common\models\mysql\Banner;
use backend\models\BannerForm;
use backend\models\Upload;
/**
* author zhoushuo <z_s106@126.com>
*/
class BannerController extends MyController
{
	
	public function actionIndex()
	{
		$model = new BannerForm();
		$dataProvider = new ActiveDataProvider([
			'query' => Banner::find(),
			'pagination' => [
				'pageSize' => 5,
			],
			'sort' => [
				'defaultOrder' => ['sort' => SORT_ASC],
			]
		]);
		return $this->render('index',['dataProvider'=>$dataProvider,'model'=>$model]);
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
	}
//删除图片
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$attachment = Yii::$app->params['imageUploadRelativePath'].$model->url;
		if(file_exists($attachment))
			unlink($attachment);
		$model->delete();
		return $this->redirect(['index']);
	}

	public function findModel($id)
	{
		if(($model = Banner::findOne($id)) !== null)
			return $model;
		else
			throw new NotFoundHttpException('页面不存在.');
	}
//图片上传
	public function actionCreate()
	{
		$model = new BannerForm();
		if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save('image'))
			$this->redirect('index');
		else
			return $this->render('create',['model' => $model]);
	}
//图片上传处理
	public function actionUpload()
	{
		$model = new Upload();
		$info = $model->upImage();
		Yii::$app->response->format = Response::FORMAT_JSON;
		if($info && is_array($info))
		{
			return $info;
		}
		else
			return ['code' => 1,'msg' => 'error'];
	}
//图片保存到数据库中mysql
	public function saveBanner($info)
    {
        // var_dump($info);exit();
        $model = new Banner();
        $model->url = $info['url'];
        if($model->findOne($model->url) !== null)
        	return true;
        $model->sort = 0;
        $res = $this->imageSize($info['attachment']);
        $model->width = $res['width'];
        $model->height = $res['height'];
        $model->mime = $info['type'];
        return $model->save();
        
    }
//获取图片的尺寸
    public function imageSize($imagePath)
    {
    	$size = getimagesize($imagePath);
		$a = explode(" ", $size[3]);
		$res = array();
		for($i = 0;$i<count($a);$i++)
		{
			$temp = explode("=", $a[$i]);
			$res[$temp[0]] = (int)trim($temp[1],'"');
		}
		$res['mime'] = $size['mime'];
		return $res;
    }

    public function actionVideo()
    {
    	$model = new BannerForm();
    	// $info = $model->info('video');
    	if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save('video'))
    		return $this->redirect('index');
    	else
    		return $this->render('video',['model'=>$model]);
    }
}