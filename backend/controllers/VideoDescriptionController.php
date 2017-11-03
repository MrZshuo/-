<?php
/**
 * Created by PhpStorm.
 * User: zhou shuo
 * Date: 2017/11/1
 * Time: 17:33
 */

namespace backend\controllers;


use common\models\mysql\ContentDescription;
use yii\data\ActiveDataProvider;

class VideoDescriptionController extends MyController
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ContentDescription::find()
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }
}