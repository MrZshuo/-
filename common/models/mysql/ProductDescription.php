<?php

namespace common\models\mysql;

use Yii;


/**
 * This is the model class for table "{{%product_description}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $language_id
 * @property string $display_name
 * @property string $content
 * @property string $short_info
 * @property string $key_words
 */
class ProductDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_description}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'language_id'], 'required'],
            [['product_id', 'language_id'], 'integer'],
            [['content'], 'string'],
            [['display_name'], 'string','max' => 50],
            [['short_info', 'key_words'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', '产品id'),
            'language_id' => Yii::t('app', '语言'),
            'display_name' => Yii::t('app', '显示名称'),
            'content' => Yii::t('app', '产品介绍'),
            'short_info' => Yii::t('app', '产品简介'),
            'key_words' => Yii::t('app', '产品关键字'),
        ];
    }

    public function getProductName()
    {
        return $this->hasOne(Product::className(),['id'=>'product_id'])->select('name');
    }

    public function getLanguageName()
    {
        return $this->hasOne(Language::className(),['id'=>'language_id'])->select('name');
    }
}
