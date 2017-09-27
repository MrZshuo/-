<?php
namespace common\models\mysql;

use Yii;
use yii\db\ActiveRecord;
/**
* author zhoushuo <z_s106@126.com>
*/
class Banner extends ActiveRecord
{
	/**
	* @return  string the name of the index associated with this ActiveRecord class
	*/
    public static function tableName()
    {
        return '{{%banner}}';
    }

    public function rules()
    {
        return [
            ['mime','string'],
            [['url','info'],'string','max'=>255],
            [['width','height'],'number'],
            ['sort','number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'name' => Yii::t('app','文片名'),
            'info' => Yii::t('app','文件描述'),
            'url' => Yii::t('app','文件相对路径'),
            'width' => Yii::t('app','图片宽'),
            'height' => Yii::t('app','图片高'),
            'sort' => Yii::t('app','排序'),
        ];
    }



}