<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%content_description}}".
 *
 * @property integer $content_id
 * @property integer $language_id
 * @property string $content_title
 * @property string $content_info
 * @property string $content
 * @property integer $status
 */
class ContentDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content_description}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'language_id'], 'required'],
            [['content_id', 'language_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['content_title'], 'string', 'max' => 50],
            [['content_info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content_id' => Yii::t('app', 'Content ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'content_title' => Yii::t('app', '标题前端显示名'),
            'content_info' => Yii::t('app', '简介'),
            'content' => Yii::t('app', '内容详情'),
            'status' => Yii::t('app', '0删除'),
        ];
    }

    //获取内容名
    public function getContentName()
    {
        return $this->hasOne(Content::className(),['id'=>'content_id']);
    }

    //获取语言
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('name');
    }

    public function getContentMap()
    {

    }
}
