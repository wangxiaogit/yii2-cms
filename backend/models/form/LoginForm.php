<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/30
 * Time: 11:32
 */

namespace backend\models\form;

use backend\models\Admin;
use yii\base\Model;
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $captcha;
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'captcha'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            //captcha
            ['captcha', 'captcha', 'captchaAction'=>'site/captcha','message'=> \Yii::t('app', 'Verification code error.')]
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, \Yii::t('app', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return \Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'Username'),
            'password' => \Yii::t('app', 'Password'),
            'rememberMe' => \Yii::t('app', 'rememberMe'),
            'captcha' => \Yii::t('app', 'Captcha'),
        ];
    }
}