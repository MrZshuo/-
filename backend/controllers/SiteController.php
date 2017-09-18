<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use common\models\mysql\VisitorCount;
use common\models\mysql\Customer;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = VisitorCount::find()->all();
        $customer = new \yii\data\ActiveDataProvider([
            'query' => Customer::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['create_at'=>SORT_DESC,'status'=>SORT_ASC],
            ],
        ]);
        return $this->render('index',['count' => $model[0],'dataProvider' => $customer]);
    }
    //显示客户询盘详情
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if($model->status == 0)
        {
            $model->status = 1;
            $model->save();
        }
        return $this->render('view',['model'=>$model]);
    }
    //判断是否存在该条询盘讯息
    public function findModel($id)
    {
        if(($model = Customer::findOne($id)) !== null)
            return $model;
        else
            throw new NotFoundHttpException("页面不存在.");
            
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
