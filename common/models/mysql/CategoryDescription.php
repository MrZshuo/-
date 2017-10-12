<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%category_description}}".
 *
 * @property integer $category_id
 * @property integer $language_id
 * @property string $show_name
 */
class CategoryDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category_description}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'language_id'], 'required'],
            [['category_id', 'language_id'], 'integer'],
            [['show_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', '产品分类'),
            'language_id' => Yii::t('app', '语言'),
            'show_name' => Yii::t('app', '多语言显示名'),
        ];
    }
    //获取产品类名
    public function getCategoryName()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id'])->select('name')->where(['status'=>1]);
    }
    //获取语言名
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('language_name');
    }
}
