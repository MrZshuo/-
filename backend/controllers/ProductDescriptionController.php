<?php

namespace backend\controllers;

use Yii;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use common\models\mysql\ProductDescription;
use common\models\mysql\Language;
use backend\models\ProductDescriptionSearch;
use backend\models\Upload;
use backend\controllers\MyController;
use yii\filters\VerbFilter;

/**
 * ProductDescriptionController implements the CRUD actions for ProductDescription model.
 */
class ProductDescriptionController extends MyController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

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

    public function upload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Upload();
        $info = $model -> upImage();
    }

    /**
     * Lists all ProductDescription models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductDescriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductDescription model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductDescription model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ProductDescription();
        $model->product_id = intval($id);
        $langlist = Language::getLanguageMap();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create','id'=>$id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'langlist' => $langlist,
            ]);
        }
    }

    /**
     * Updates an existing ProductDescription model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $langlist = Language::find()->select(['name','id'])->where(['status'=>1])->indexBy('id')->column();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'langlist' => $langlist,
            ]);
        }
    }

    /**
     * Deletes an existing ProductDescription model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductDescription model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductDescription the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductDescription::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
