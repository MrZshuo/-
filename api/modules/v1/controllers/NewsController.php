<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;


use common\models\mysql\Content;
use common\models\mysql\ContentDescription;
use common\models\mysql\Nav;
use common\models\mysql\Language;
/**
* author zhoushuo <z_s106@126.com>
*/
class NewsController extends ActiveController
{
	const CONTENT_LIST = 'content_list_';
	const CONTENT_INFO = 'content_info_';

	public $modelClass = 'common\models\mysql\Content';
	//注销系统自带的实现方法
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'],$actions['update'],$actions['create'],$actions['delete'],$actions['view']);
		return $actions;
	}
	//获取news/video/about us 内容列表
	public function actionList($lang = 'en',$nav_id,$page = 1,$pagesize = 12)
	{
		if(Yii::$app->cache->exists(CONTENT_LIST.$lang.'_'.$nav_name.'_'.$page.'_'.$pagesize))
			return Yii::$app->cache->get(CONTENT_LIST.$lang.'_'.$nav_name.'_'.$page.'_'.$pagesize);
		else
		{
			$lang_id = Language::getIdByShortName($lang);
			$pid = Nav::find()->select(['id'])->where(['pid'=>$nav_id])->asArray()->column();
			if(!empty($pid))
				$nav_id = $pid;
			$from = ($page-1)*$pagesize;
			$totalCount = ContentDescription::find()->select(['c.id'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['c.nav_id'=>$nav_id,'c.status'=>1,'d.language_id'=>$lang_id])->count();
			if($totalCount < 1)
				$info = [
					'msg' => 'error',
					'code' => 500,
					'lang' => $lang,
					'message' => '未找到当前语言对应的信息',
				];

			else
			{
				$data = ContentDescription::find()->select(['c.id','c.content_url','c.type','d.show_title','d.content_info'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['c.nav_id'=>$nav_id,'c.status'=>1,'d.language_id'=>$lang_id])->orderBy('c.create_at DESC')->offset($from)->limit($pagesize)->asArray()->all();

				$info = [
					'msg' => 'ok',
					'code' => 200,
					'lang' => $lang,
					'page' => $page,
					'pagesize' => $pagesize,
					'totalcount' => $totalCount,
					'list' => $data,
				];
			}
			if(Yii::$app->params['cache'] === true)
				Yii::$app->cache->set(CONTENT_LIST.$lang.'_'.$nav_name.'_'.$page.'_'.$pagesize,$info);
			return $info;	
		}
	}
	//内容详细信息
	public function actionView($content_id,$lang = 'en')
	{

		$lang_id = Language::getIdByShortName($lang);
		$data = ContentDescription::find()->select(['c.id','c.content_url','c.type','d.show_title','d.content_info','d.content'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['d.content_id'=>$content_id,'c.status'=>1,'d.language_id'=>$lang_id])->asArray()->one();
		if(empty($data))
			$info = [
				'msg' => 'error',
				'code' => 500,
				'message' => '未找到当前语言对应的信息',
			];
		else
		{
			$info = [
				'msg' => 'ok',
				'code' => 200,
				'lang' => $lang,
				'info' => $data,
			];
		}
		return $info;
	}
	//浏览次数
	public function actionVisitor()
	{
		$id = Yii::$app->request->post('content_id');

		if($model = Content::findOne($id))
		{
			$model->visitor += 1;
			$model->save();
			return [
				'msg' => 'ok',
				'code' => 200,
				'visitor' => $model->visitor,
			];
		}
		else
			return [
				'msg' => 'error',
				'code' => 500,
				'message' => '内容不存在',
			];
	}
	//热门新闻内容 列表
	public function actionHotContent($lang = 'en',$nav_id,$num)
	{
		$lang_id = Language::getIdByShortName($lang);

		$pid = Nav::find()->select(['id'])->where(['pid'=>$nav_id])->asArray()->column();
		if(!empty($pid))
				$nav_id = $pid;

		$data = ContentDescription::find()->select(['c.content_url','c.type','d.show_title','d.content_info'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['c.nav_id'=>$nav_id,'c.status'=>1,'d.language_id'=>$lang_id])->orderBy('c.visitor DESC')->limit($num)->asArray()->all();
		if(empty($data))
			$info = [
				'msg' => 'error',
				'code' => 500,
				'message' => '未找到当前语言对应的信息',
			];
		else
		{
			$info = [
				'msg' => 'ok',
				'code' => 200,
				'lang' => $lang,
				'info' => $data,
			];
		}
		return $info;
	}
}