<?php

namespace backend\controllers;

use Yii;
use common\models\mysql\ContentDescription;
use common\models\mysql\Content;
use common\models\mysql\ContentDescriptionSearch;
use backend\controllers\MyController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContentDescriptionController implements the CRUD actions for ContentDescription model.
 */
class ContentDescriptionController extends MyController
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
    //配置Ueditor图片及视频上传
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
                    // 'image'

                    'videoPathFormat' => '/video/{yyyy}{mm}{dd}/{time}{rand:6}',
                    'videoUrlPrefix' => 'http://images.yii.com',
                    'videoRoot' => '../../uploads',
                    'videoAllowFiles' => ['.flv','.swf','.mkv','.avi','.rm','.rmvb','.wmv','.mp4','.wav','.mid'],
                    // 'videoMaxSize' => 51200000,
                ],
            ],
        ];
    }

    /**
     * Lists all ContentDescription models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentDescriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContentDescription model.
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
     * Creates a new ContentDescription model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ContentDescription();
        $model->content_id = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ContentDescription model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ContentDescription model.
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
     * Finds the ContentDescription model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContentDescription the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContentDescription::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionContent($nav_id)
    {
        $str = '';
        $data = Content::find()->select(['content_title','id'])->where(['nav_id' => $nav_id,'status'=>1])->all();
        foreach ($data as $key => $value) {
            $str .= '<option value="'.$value->id.'">'.$value->content_title.'</option>';
        }
        return $str;
    }
}
