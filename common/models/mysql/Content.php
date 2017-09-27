<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property integer $id
 * @property integer $nav_id
 * @property string $content_url
 * @property string $type
 * @property string $create_at
 * @property string $update_at
 * @property string $author
 * @property integer $status
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nav_id','content_title'], 'required'],
            [['nav_id', 'status'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['content_url', 'content_title', 'author'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Content ID'),
            'nav_id' => Yii::t('app', '分类'),
            'content_title' => Yii::t('app', '内容名'),
            'content_url' => Yii::t('app', '资源路径'),
            'type' => Yii::t('app', '资源类型'),
            'create_at' => Yii::t('app', '创建时间'),
            'update_at' => Yii::t('app', '修改时间'),
            'author' => Yii::t('app', '作者'),
            'status' => Yii::t('app', '状态'),
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            { 
                $this->create_at = $this->update_at = date("Y-m-d H:i:s");
                // $this->image_url = Yii::$app->params['domain'].$this->image_url;
            }
            else
                $this->update_at = date("Y-m-d H:i:s");
            if($this->author == null && !Yii::$app->user->isGuest)
                $this->author = Yii::$app->user->identity->username;
            return true;
        }
        else
            return false;
    }
    //获取导航名
    public function getNavName()
    {
        return $this->hasOne(Nav::className(),['id'=>'nav_id'])->select('name');
    }
    //获取语言名
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('name');
    }

    public static function getContentMap($nav_id)
    {
        return self::find()->select(['content_title','id'])->where(['nav_id' => $nav_id,'status' => 1])->indexBy('id')->asArray()->all();
    }

    public static function getContentNavMap()
    {
        return self::find()->select(['n.name','n.id'])->from('content c')->leftJoin('nav n','c.nav_id = n.id')->groupBy('c.nav_id')->indexBy('id')->column();
    }
}
