<?php
namespace common\models\mongodb;

use yii\mongodb\ActiveRecord;
/**
* author zhoushuo <z_s106@126.com>
*/
class Banner extends ActiveRecord
{
	/**
	* @return  string the name of the index associated with this ActiveRecord class
	*/
    public static function collectionName()
    {
        return 'banner';
    }

    public function rules()
    {
        return [
            ['name','string'],
            ['url','string','max'=>255],
            ['sort','number'],
        ];
    }
    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return ['_id','name','url','sort','width','height','mime'];
    }
     /**
     * 给model对应的表创建索引的方法
     * 在indexs数组中填写索引，如果有多个索引，可以填写多行
     * 在migrate的时候会运行创建索引，譬如：
     * 
     */
    public static function create_index()
    {
        $indexs = [
            ['url'  => -1,'unique' => 1],//降序

        ];
        //在后台构建索引，以便构建索引不会阻止其他数据库活动
        $options = ['background' => true];
        foreach ($indexs as $columns) {
            self::getCollection()->createIndex($columns, $options);
        }
    }


}