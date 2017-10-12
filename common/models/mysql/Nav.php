<?php

namespace common\models\mysql;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%nav}}".
 *
 * @property integer $id
 * @property integer $language_id
 * @property integer $pid
 * @property string $name
 * @property integer $sort
 */
class Nav extends \yii\db\ActiveRecord
{
    // public $nav = 99;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nav}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['sort', 'default','value'=>99],
            ['pid', 'default','value'=>0],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app','父导航'),
            // 'language_id' => Yii::t('app', '语言'),
            'name' => Yii::t('app', '名称'),
            'sort' => Yii::t('app', '排序'),
        ];
    }

    /**
    *获取语言name
    *
    */
    // public function getLanguageName()
    // {
    //     return $this->hasOne(Language::className(),['id'=>'language_id'])->select('name');
    // }
    //获取所有导航
    public static function getNavMap()
    {
       return self::find()->select(['name','id'])->where(['status'=>1])->orderBy('sort ASC')->indexBy('id')->column();
    }
    //获取一级导航
    public static function getFirstNav()
    {
        return self::find()->select(['name','id'])->where(['status'=>1,'pid'=>0])->orderBy('sort ASC')->indexBy('id')->column();
    }
    public static function getNavNameMap()
    {
       return self::find()->select(['name','id'])->where(['status'=>1])->orderBy('sort ASC')->indexBy('name')->column();
    }
}
