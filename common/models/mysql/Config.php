<?php
/**
 * Created by PhpStorm.
 * User: 号召力
 * Date: 2017/10/31
 * Time: 15:21
 */

namespace common\models\mysql;


class Config extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%config}}';
    }

    public function rules()
    {
        return [
            ['status','number']
        ];
    }
}