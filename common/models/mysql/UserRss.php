<?php
/**
 * Created by PhpStorm.
 * User: 号召力
 * Date: 2017/11/3
 * Time: 11:05
 */

namespace common\models\mysql;


use yii\db\ActiveRecord;

class UserRss extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_rss}}';
    }

    public function rules()
    {
        return [
            ['email','required'],
            ['name','string','max' => 50],
            ['email','string','max' => 255]
        ];
    }
}