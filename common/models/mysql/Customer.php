<?php

namespace common\models\mysql;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $postcode
 * @property string $telephone
 * @property string $fax
 * @property string $theme
 * @property string $content
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'email'], 'required'],
            [['firstname', 'lastname', 'theme'], 'string', 'max' => 50],
            [['email', 'address', 'content'], 'string', 'max' => 255],
            [['city', 'province', 'country', 'postcode', 'telephone', 'fax'], 'string', 'max' => 20],
            ['status','number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', '姓'),
            'lastname' => Yii::t('app', '名'),
            'email' => Yii::t('app', '邮箱'),
            'address' => Yii::t('app', '地址'),
            'city' => Yii::t('app', '市'),
            'province' => Yii::t('app', '省'),
            'country' => Yii::t('app', '国家'),
            'postcode' => Yii::t('app', '邮编'),
            'telephone' => Yii::t('app', '电话'),
            'fax' => Yii::t('app', '传真'),
            'theme' => Yii::t('app', '主题'),
            'content' => Yii::t('app', '内容'),
            'create_at' => Yii::t('app', '时间'),
        ];
    }
}
