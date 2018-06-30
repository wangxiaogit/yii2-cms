<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id 自增管理员用户id
 * @property string $username 管理员用户名
 * @property string $auth_key 管理员cookie验证auth_key
 * @property string $password_hash 管理员加密密码
 * @property string $password_reset_token 管理员找回密码token
 * @property string $email 管理员邮箱
 * @property string $avatar 管理员头像url
 * @property int $status 管理员状态,10正常
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class Admin extends User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'avatar' => Yii::t('app', 'Avatar'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
