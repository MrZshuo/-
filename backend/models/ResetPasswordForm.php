<?php
namespace backend\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use backend\models\AdminUser as User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    /**
     * @var \backend\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($id, $config = [])
    {
        if (empty($id) || !is_numeric($id)) {
            throw new InvalidParamException('缺少参数.');
        }
        $this->_user = User::findOne($id);
        if (!$this->_user) {
            throw new InvalidParamException('用户不存在.');
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        // $user->removePasswordResetToken();
        return $user->save(false);
    }
}
