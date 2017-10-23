<?php
/**
 * Created by PhpStorm.
 * User: 周硕
 * Date: 2017/10/16
 * Time: 20:22
 */

namespace backend\controllers;

use Yii;
use common\models\mysql\Question;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class QuestionController extends MyController
{
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    'imageUrlPrefix' => Yii::$app->params['domain'],
                    'imageRoot' => '../../uploads',
                    'imagePathFormat' => '/images/{yyyy}{mm}{dd}/{time}{rand:6}',
                    "imageAllowFiles" => [".png",".jpg",".jpeg",".gif",".bmp"],

                    'videoPathFormat' => '/video/{yyyy}{mm}{dd}/{time}{rand:6}',
                    'videoUrlPrefix' => 'http://images.yii.com',
                    'videoRoot' => '../../uploads',
                    'videoAllowFiles' => ['.flv','.swf','.mkv','.avi','.rm','.rmvb','.wmv','.mp4','.wav','.mid'],
                    // 'videoMaxSize' => 51200000,
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Question::find(),
            'pagination' => [
                'pageSize' => 15,
            ]
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new Question();
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect('create');
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect('index');
        return $this->render('create',['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        if($model->save())
            $this->render('index');

    }

    public function actionView($id)
    {

    }
    private function findModel($id)
    {
        if(($model = Question::findOne($id)) !== null )
            return $model;
        else
            throw new NotFoundHttpException('数据不存在.');
    }
}