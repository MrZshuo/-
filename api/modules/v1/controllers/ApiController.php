<?php
/**
 * Created by PhpStorm.
 * User: 号召力
 * Date: 2017/10/13
 * Time: 18:00
 */

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class ApiController extends ActiveController
{
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['http://localhost:9002','http://test.sinovinyl.com','http://192.168.2.63:8081'],
                    'Access-Control-Request-Method' => ['GET', 'POST'],
                    'Access-Control-Allow-Credentials' => true,
                ],

            ],
        ], parent::behaviors());
    }
    /*	public $serializer = [
            'class' => 'yii\rest\Serializer',
            // 'collectionEnvelope' => 'items',
        ],*/
    //注销系统自带的实现方法
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'],$actions['update'],$actions['create'],$actions['delete'],$actions['view']);
        return $actions;
    }
}