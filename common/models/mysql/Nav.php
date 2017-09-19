<?php

namespace common\models\mysql;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%nav}}".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $name
 * @property integer $sort
 */
class Nav extends \yii\db\ActiveRecord
{
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
            [['language_id', 'sort'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language_id' => Yii::t('app', '语言'),
            'name' => Yii::t('app', '名称'),
            'sort' => Yii::t('app', '排序'),
        ];
    }

    /**
    *获取语言name
    *
    */
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('name');
    }

    public static function getNavMap($language_id)
    {
       return self::find()->select(['name','id'])->where(['language_id'=>$language_id])->indexBy('id')->column();
    }
}
