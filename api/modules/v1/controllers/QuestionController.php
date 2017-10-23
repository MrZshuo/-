<?php
/**
 * Created by PhpStorm.
 * User: zhou shuo
 * Date: 2017/10/17
 * Time: 18:14
 */

namespace api\modules\v1\controllers;

use Yii;
use common\models\mysql\Question;
use common\models\mysql\Language;

class QuestionController extends ApiController
{
    const QUESTION_LIST = 'question_list_';
    public $modelClass = 'common\models\mysql\Question';

    public function actionIndex($lang = 'en')
    {
        if(Yii::$app->cache->exists(self::QUESTION_LIST.$lang))
            return Yii::$app->cache->get(self::QUESTION_LIST.$lang);
        else
        {
            $lang_id = Language::getIdByShortName($lang);
            $count = Question::find()->select(['id'])->where(['language_id' => $lang_id])->count();
            $data = Question::find()->select(['id','question','answer'])->where(['language_id' => $lang_id])->asArray()->all();
            $info = [
                'msg' => 'ok',
                'list' => $data,
                'totalCount' => $count
            ];
            return $info;
        }
    }
}