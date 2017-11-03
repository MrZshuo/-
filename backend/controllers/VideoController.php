<?php
/**
 * Created by PhpStorm.
 * User: zhou shuo
 * Date: 2017/11/1
 * Time: 16:33
 */

namespace backend\controllers;

use Yii;
use common\models\mysql\Content;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class VideoController extends MyController
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Content::find()->where(['nav_id' => 9]),
            'pagination' => [
                'pageSize' => 6,
            ]
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }
// 上传视频
    public function actionCreate()
    {
        $model = new Content();
        $model->nav_id = 9;
        $model->type = 'video';
        $model->status = 1;
        $model->sort = 99;
        if($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect('index');
        else
            return $this->render('create',['model' => $model]);
    }
// 删除视频
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        return $this->redirect('index');
    }
// 修改视频
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect('index');
        else
            return $this->render('update',['model' => $model]);
    }
    private function findModel($id)
    {
        if(($model = Content::findOne($id)) !== null)
            return $model;
        else
            throw new NotFoundHttpException('未找到对应的信息');
    }
}