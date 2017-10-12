<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%nav_showname}}".
 *
 * @property integer $nav_id
 * @property integer $language_id
 * @property string $nav_name
 */
class NavShowname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nav_showname}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nav_id', 'language_id'], 'required'],
            [['nav_id', 'language_id'], 'integer'],
            [['show_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nav_id' => Yii::t('app', '导航id'),
            'language_id' => Yii::t('app', '语言id'),
            'show_name' => Yii::t('app', '导航显示名'),
        ];
    }
    //获取导航名
    public function getNavName()
    {
        return $this->hasOne(Nav::className(),['id'=>'nav_id'])->select('name')->where(['status'=>1]);
    }
    //获取语言名
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('language_name')->where(['>=','status',0]);
    }
}
