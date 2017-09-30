<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%product_property}}".
 *
 * @property integer $product_id
 * @property integer $language_id
 * @property string $property_name
 * @property string $property_value
 */
class ProductProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_property}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'language_id'], 'required'],
            [['language_id','product_id'], 'integer'],
            [[ 'property_name'], 'string', 'max' => 50],
            [['property_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', '产品ID'),
            'language_id' => Yii::t('app', '语言'),
            'property_name' => Yii::t('app', '属性名'),
            'property_value' => Yii::t('app', '属性值'),
        ];
    }
    //获取属性名
    public function getProductName()
    {
        return $this->hasOne(Product::className(),['id'=>'product_id']);
    }
    //获取语言名
    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select(['name']);
    }
}
