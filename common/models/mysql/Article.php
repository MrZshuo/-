<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $nav_id
 * @property string $title
 * @property string $author
 * @property string $image_url
 * @property string $info
 * @property string $content
 * @property string $create_at
 * @property string $update_at
 * @property integer $sort
 * @property integer $status
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'title'], 'required'],
            [['language_id', 'sort', 'status'], 'integer'],
            [['content'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['nav_id', 'image_url', 'info'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 60],
            [['author'], 'string', 'max' => 30],
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
            'nav_id' => Yii::t('app', '栏目'),
            'title' => Yii::t('app', '标题'),
            'author' => Yii::t('app', '作者'),
            'image_url' => Yii::t('app', '图片'),
            'info' => Yii::t('app', '简介'),
            'content' => Yii::t('app', '内容'),
            'create_at' => Yii::t('app', '创建时间'),
            'update_at' => Yii::t('app', '修改时间'),
            'sort' => Yii::t('app', '排序'),
            'status' => Yii::t('app', '状态'),
        ];
    }
    //获取language name
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('name');
    }

    //获取nav name
    public function getNavName()
    {
        return $this->hasOne(Nav::className(),['id'=>'nav_id'])->select('name');
    }
}
