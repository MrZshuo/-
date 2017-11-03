<?php
/**
 * Created by PhpStorm.
 * User: zhoushuo
 * Date: 2017/10/31
 * Time: 14:43
 */

namespace backend\models;

use yii\base\Model;

class CustomerForm extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $city;
    public $province;
    public $country;
    public $postcode;
    public $telephone;
    public $fax;
    public $theme;
    public $content;
}