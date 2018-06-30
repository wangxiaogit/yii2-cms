<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m180630_024508_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey()->comment('自增管理员用户id'),
            'username'=> $this->string(255)->notNull()->comment("管理员用户名")->unique(),
            'auth_key' => $this->string(32)->notNull()->comment("管理员cookie验证auth_key"),
            'password_hash' => $this->string(255)->notNull()->comment("管理员加密密码"),
            'password_reset_token' => $this->string(255)->defaultValue(null)->comment("管理员找回密码token")->unique(),
            'email' => $this->string(255)->notNull()->comment("管理员邮箱")->unique(),
            'avatar' => $this->string(255)->defaultValue('')->comment("管理员头像url"),
            'status' => $this->smallInteger(2)->defaultValue(10)->comment("管理员状态,10正常"),
            'created_at' => $this->integer(11)->notNull()->comment("创建时间"),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0)->comment("最后修改时间"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admin');
    }
}
