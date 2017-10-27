<?php

namespace api\modules\v1\controllers;

use Yii;

use common\models\mysql\Content;
use common\models\mysql\ContentDescription;
use common\models\mysql\Nav;
use common\models\mysql\Language;
/**
* author zhoushuo <z_s106@126.com>
*/
class NewsController extends ApiController
{
	const CONTENT_LIST = 'content_list_';
	const CONTENT_INFO = 'content_info_';
	const CONTENT_GROUP = 'content_group_';
    const CONTENT_HOT = 'content_hot_';
    const CONTENT_HOME_NEWS = 'content_home_news_';

	public $modelClass = 'common\models\mysql\Content';
	//获取news/video/about us 内容列表
	private function getList($lang = 'en',$nav_id,$page = 1,$pagesize = 12)
	{
		if(Yii::$app->cache->exists(self::CONTENT_LIST.$lang.'_'.$nav_id.'_'.$page.'_'.$pagesize))
			return Yii::$app->cache->get(self::CONTENT_LIST.$lang.'_'.$nav_id.'_'.$page.'_'.$pagesize);
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
				$data = ContentDescription::find()->select(['c.id','c.content_url as url','c.video_show','d.show_title as title','d.content_info','c.create_at as date'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['c.nav_id'=>$nav_id,'c.status'=>1,'d.language_id'=>$lang_id])->orderBy('c.create_at DESC')->offset($from)->limit($pagesize)->asArray()->all();
                foreach ($data as &$value)
                {
                    $value['url'] = Yii::$app->params['domain'].$value['url'];
                    if(!empty($value['video_show']))
                        $value['video_show'] = Yii::$app->params['domain'].$value['video_show'];
                }
				$info = [
					'msg' => 'ok',
					'code' => 200,
					'lang' => $lang,
					'page' => $page,
					'pageSize' => $pagesize,
					'totalCount' => $totalCount,
					'list' => $data,
				];
			}
			if(Yii::$app->params['cache'] === true)
				Yii::$app->cache->set(self::CONTENT_LIST.$lang.'_'.$nav_id.'_'.$page.'_'.$pagesize,$info);
			return $info;	
		}
	}
	//内容详细信息
	public function actionView($content_id,$lang = 'en')
	{
		$lang_id = Language::getIdByShortName($lang);
		$data = ContentDescription::find()->select(['c.id','c.content_url as url','c.type','d.show_title title','d.content_info','d.content'])
            ->from('content_description d')->leftJoin('content c','c.id=d.content_id')
            ->where(['d.content_id'=>$content_id,'c.status'=>1,'d.language_id'=>$lang_id])->asArray()->one();
		if(empty($data))
			$info = [
				'msg' => 'error',
				'code' => 500,
				'message' => '未找到当前语言对应的信息',
			];
		else
		{
		    $data['url'] = Yii::$app->params['domain'].$data['url'];
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
    // 获取热门新闻列表
	public function actionHotNews($lang = 'en',$nav_id = 10,$num = 3)
    {
        return $this->getHotContent($lang,$nav_id,$num);
    }
    // 获取热门视频
    public function actionHotVideo($lang = 'en',$nav_id = 9,$num = 3)
    {
        return $this->getHotContent($lang,$nav_id,$num);
    }
	// 获取热门内容 列表
	private function getHotContent($lang = 'en',$nav_id,$num )
	{
	    if(Yii::$app->cache->exists(self::CONTENT_HOT.$lang.'_'.$nav_id.'_'.$num))
	        return Yii::$app->cache->get(self::CONTENT_HOT.$lang.'_'.$nav_id.'_'.$num);
	    else
        {
            $lang_id = Language::getIdByShortName($lang);
            $pid = Nav::find()->select(['id'])->where(['pid'=>$nav_id])->asArray()->column();
            if(!empty($pid))
                $nav_id = $pid;

            $data = ContentDescription::find()->select(['c.id','c.content_url as url','c.create_at as date','c.video_show','d.show_title as title','d.content_info'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['c.nav_id'=>$nav_id,'c.status'=>1,'d.language_id'=>$lang_id])->orderBy('c.visitor DESC')->limit($num)->asArray()->all();
            if(empty($data))
                $info = [
                    'msg' => 'error',
                    'code' => 500,
                    'message' => '未找到当前语言对应的信息',
                ];
            else
            {
                foreach ($data as &$value)
                {
                    $value['url'] = Yii::$app->params['domain'].$value['url'];
                    if(!empty($value['video_show']))
                        $value['video_show'] = Yii::$app->params['domain'].$value['video_show'];
                }
                $info = [
                    'msg' => 'ok',
                    'code' => 200,
                    'lang' => $lang,
                    'info' => $data,
                ];
            }
            if(Yii::$app->params['cache'] === true)
                Yii::$app->cache->set(self::CONTENT_HOT.$lang.'_'.$nav_id.'_'.$num ,$info);
            return $info;
        }
	}
	//获取sino团队信息
    public function actionGroup($lang = 'en',$num = 3,$nav_id = 7)
    {
        if(Yii::$app->cache->exists(self::CONTENT_GROUP.$lang))
            return Yii::$app->cache->get(self::CONTENT_GROUP.$lang);
        else
        {
            $lang_id = Language::getIdByShortName($lang);
            $data = ContentDescription::find()->select(['c.id','c.content_url','d.show_title as title','d.content_info'])->from('content_description d')->leftJoin('content c','c.id=d.content_id')->where(['c.nav_id' => $nav_id,'d.language_id' => $lang_id])->orderBy('c.sort ASC')->limit($num)->asArray()->all();
            if(!empty($data))
            {
                foreach ($data as &$value)
                {
                    $value['content_url'] = Yii::$app->params['domain'].$value['content_url'];
                    if(strpos($value['content_info'],'#'))
                        $value['content_info'] = explode('#',$value['content_info']);
                }
            }
            $info =  [
                'msg' => 'ok',
                'data' => $data
            ];
            if(Yii::$app->params['cache'] === true)
                Yii::$app->cache->set(self::CONTENT_GROUP.$lang,$info);
            return $info;
        }
    }

    //获取首页新闻列表 company news 28 /Exhibition News 29
    public function actionHomeNews($lang = 'en')
    {
        if(Yii::$app->cache->exists(self::CONTENT_HOME_NEWS.$lang) && Yii::$app->params['cache'] === true)
        {
            return  Yii::$app->cache->get(self::CONTENT_HOME_NEWS.$lang);
        }
        else
        {
            $com_news = $this->getList($lang,28,1,3);
            $exh_news = $this->getList($lang,29,1,3);
            $info = [
                'msg' => 'ok',
                'com_news' => [
                    'url' => $com_news['list'][0]['url'],
                    'newsList' => $com_news['list'],
                ],
                'exh_news' => [
                    'url' => $exh_news['list'][0]['url'],
                    'newsList' => $exh_news['list'],
                ],
            ];
            if(Yii::$app->params['cache'] === true)
                Yii::$app->cache->set(self::CONTENT_HOME_NEWS.$lang, $info);
            return $info;
        }
    }
    // 获取视频列表
    public function actionVideoList($lang = 'en',$page = 1,$pageSize = 12)
    {
        return $this->getList($lang,9,$page,$pageSize);
    }

    // 获取新闻列表
    public function actionNewsList($lang = 'en',$page = 1, $pageSize = 12)
    {
        return $this->getList($lang,10,$page,$pageSize);
    }

}