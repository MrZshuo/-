<?php
/**
 * Created by PhpStorm.
 * User: zhou shuo
 * Date: 2017/10/17
 * Time: 18:14
 */

namespace api\modules\v1\controllers;

use Yii;
use common\models\mysql\ContentDescription;
use common\models\mysql\Language;
use common\models\mysql\Content;
class AboutController extends ApiController
{
//    const QUESTION_LIST = 'question_list_';
    public $modelClass = 'common\models\mysql\Content';

    public function actionCompanyProfile($lang = 'en')
    {
        return $this->getInfo($lang,$nav_id = 30);
    }

    public function actionVideoShow($lang = 'en',$nav_id = 31)
    {
        $lang_id = Language::getIdByShortName($lang);
        $data = Content::find()->select(['id','content_url as url'])->where(['status' => 1])->asArray()->one();
        $data['url'] = Yii::$app->params['domain'].$data['url'];
        $info = [
            'msg' => 'ok',
            'data' => $data
        ];
        return $info;
    }

    public function actionCompanyShow($lang = 'en')
    {
        return $this->getInfo($lang,$nav_id = 32);
    }

    public function actionMarket($lang = 'en')
    {
        return $this->getInfo($lang,$nav_id = 33);
    }

    private function getInfo($lang = 'en',$nav_id)
    {
        $lang_id = Language::getIdByShortName($lang);
        $data = ContentDescription::find()->select(['c.id','c.content_url as url', 'd.show_title as title', 'd.content'])->from('content_description d')
            ->leftJoin('content c','d.content_id=c.id')->where(['c.nav_id'=>$nav_id,'d.language_id'=>$lang_id,'c.status'=>1])->asArray()->one();
        $info = [
            'msg' => 'ok',
            'data' => $data,
        ];
        return $info;
    }
}