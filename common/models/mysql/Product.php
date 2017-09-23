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
            [['name'], 'required'],
            [['price', 'freight'], 'string','max'=>20],
            [['create_at', 'update_at','admin_name'], 'safe'],
            [['name', 'size','image_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '产品编号'),
            'image_url' => Yii::t('app', '产品主图'),
            'price' => Yii::t('app', '价格'),
            'freight' => Yii::t('app', '运费'),
            'create_at' => Yii::t('app', '创建时间'),
            'update_at' => Yii::t('app', '更新时间'),
            'size' => Yii::t('app', '尺寸'),
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
            if($insert)
            { 
                $this->create_at = $this->update_at = date("Y-m-d H:i:s");
                // $this->image_url = Yii::$app->params['domain'].$this->image_url;
            }
            else
                $this->update_at = date("Y-m-d H:i:s");
            if(!Yii::$app->user->isGuest)
                $this->admin_name = Yii::$app->user->identity->username;
            else
                return false;
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
}
