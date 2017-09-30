<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $cost_price
 * @property string $create_at
 * @property string $update_at
 * @property string $size
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['image_url','safe'],
            [['create_at', 'update_at','admin_name'], 'string'],
            ['name', 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '产品名'),
            'image_url' => Yii::t('app', '产品主图'),
            'create_at' => Yii::t('app', '创建时间'),
            'update_at' => Yii::t('app', '更新时间'),
            'admin_name' => Yii::t('app', '编辑人'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if(is_array($this->image_url) && $this->image_url)
                $this->image_url = implode(',', $this->image_url);
            if($insert)
            { 
                $this->create_at = $this->update_at = date("Y-m-d H:i:s");
                // $this->image_url = Yii::$app->params['domain'].$this->image_url;
            }
            else
                $this->update_at = date("Y-m-d H:i:s");

            if(!Yii::$app->user->isGuest)
                $this->admin_name = Yii::$app->user->identity->username;

            return true;
        }
        else
            return false;
    }
    //获取产品名与id
    public static function getProductNameMap()
    {
        return self::find()->select(['name','id'])->indexBy('id')->where(['status'=>1])->column();
    }
    //获取产品对应分类
    public function getCategoryName()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

}
