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
            [['price', 'cost_price'], 'number'],
            [['create_at', 'update_at'], 'safe'],
            [['name', 'size'], 'string', 'max' => 255],
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
            'price' => Yii::t('app', '价格'),
            'cost_price' => Yii::t('app', '成本'),
            'create_at' => Yii::t('app', '创建时间'),
            'update_at' => Yii::t('app', '更新时间'),
            'size' => Yii::t('app', '尺寸'),
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
                $this->create_at = $this->update_at = date("Y-m-d H:i:s");
            else
                $this->update_at = date("Y-m-d H:i:s");
            return true;
        }
        else
            return false;
    }
}
