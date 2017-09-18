<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%product_images}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property string $image_url
 * @property integer $image_width
 * @property integer $image_height
 * @property string $image_mime
 */
class ProductImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'image_width', 'image_height'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['image_url', 'image_attachment', 'image_mime'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', '名称'),
            'image_url' => Yii::t('app', '图片url'),
            'image_attachment' => Yii::t('app', '相对路径'),
            'image_width' => Yii::t('app', '宽'),
            'image_height' => Yii::t('app', '高'),
            'image_mime' => Yii::t('app', '图片类型'),
        ];
    }
    /**
    *产品图搜索
    *
    */
    public function get_type()
    {
        $data = Product::find(['id,product_id'])->indexBy('id')->column();
        return $data;
    }
}
