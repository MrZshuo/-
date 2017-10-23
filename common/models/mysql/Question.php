<?php
/**
 * Created by PhpStorm.
 * User: zhoushuo
 * Date: 2017/10/16
 * Time: 20:13
 */

namespace common\models\mysql;

use Yii;
use yii\db\ActiveRecord;

class Question Extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%question}}';
    }

    public function rules()
    {
        return [
           [['language_id','question','answer'],'required'],
            ['question','string','max' => 255],
            ['sort','default','value' => 99],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => '语言',
            'question' => '问题',
            'answer' => '回答',
            'sort' => '排序',
        ];
    }

    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id']);
    }
}