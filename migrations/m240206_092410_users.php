<?php

use yii\db\Migration;

/**
 * Class m240206_092410_users
 */
class m240206_092410_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp():void
    {
        $this->createTable('users',[
            'id' => $this->primaryKey(),
            'username' => $this->string(50)-> notNull(),
            'firstname' => $this->string(50)-> notNull(),
            'lastname' => $this->string(50)-> notNull(),
            'middlename' => $this->string(50)-> notNull(),
            'password' => $this->string(255)-> notNull(),
            'auth_key' => $this->string(255)-> notNull(),
            'email' => $this->string(255)-> notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'deleted_at' => $this->dateTime()->null(),
            'ok_deleted' => $this->boolean()->defaultValue(false)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240206_092410_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240206_092410_users cannot be reverted.\n";

        return false;
    }
    */
}
