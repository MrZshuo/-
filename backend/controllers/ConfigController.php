<?php
/**
 * Created by PhpStorm.
 * User: 号召力
 * Date: 2017/10/31
 * Time: 15:36
 */

namespace backend\controllers;

use Yii;
use common\models\mysql\Config;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class ConfigController extends MyController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'update' => ['post'],
                    'delete' => ['post']
                ],
            ],
        ];
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect('index');
    }
    private function findModel($id)
    {
        if(($model = Config::findOne($id)) !== null)
            return $model;
        else
            throw new NotFoundHttpException('未找到相应信息');
    }
    public function actionIndex()
    {
        $model = New ActiveDataProvider([
            'query' => Config::find(),
        ]);
        $this->render('index',['dataProvider' => $model]);
    }
}