<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property integer $sort
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['language_id', 'sort'], 'integer'],
            [['name','show_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '产品类名'),
            'show_name' => Yii::t('app', '前台显示名'),
            'language_id' => Yii::t('app', '语言'),
            'sort' => Yii::t('app', '排序'),
        ];
    }
    //获取所有的属性列表
    public static function getCategoryMap()
    {
        return self::find()->select(['name','id'])->where(['status'=>1])->orderBy('id ASC')->indexBy('name')->groupBy(['name'])->column();
    }

    //获取语言name
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select(['name']);
    }

}
