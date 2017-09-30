<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $pid
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
            ['name', 'required'],
            [['sort','pid'], 'integer'],
            ['name', 'string', 'max' => 50],
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
            'pid' => Yii::t('app', '父类名'),
            'sort' => Yii::t('app', '排序'),
        ];
    }
    //获取所有的属性列表
    public static function getCategoryMap()
    {
        return self::find()->select(['name','id'])->where(['status'=>1])->orderBy('sort ASC')->indexBy('id')->column();
    }

    public static function getParentCategoryMap()
    {
        return self::find()->select(['name','id'])->where(['pid'=>0,'status'=>1])->orderBy('sort ASC')->indexBy('id')->column();
    }

}
