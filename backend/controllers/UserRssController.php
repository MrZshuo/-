<?php
/**
 * Created by PhpStorm.
 * User: zhoushuo
 * Date: 2017/11/3
 * Time: 12:07
 */

namespace backend\controllers;

use Yii;
use common\models\mysql\UserRss;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class UserRssController extends MyController
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
           'query' => UserRss::find(),
           'pagination' => [
               'pageSize' => 15
           ]
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect('index');
    }

    private function findModel($id)
    {
        if($model = UserRss::findOne($id))
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('不存在该信息');
        }
    }
}