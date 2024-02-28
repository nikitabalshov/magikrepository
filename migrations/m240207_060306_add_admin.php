<?php

use yii\db\Migration;

/**
 * Class m240207_060306_add_admin
 */
class m240207_060306_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp():void
    {
        $this->insert('users',[
            'username' =>'admin',
            'firstname' =>'Admin',
            'lastname' =>'admin',
            'middlename' =>'admin',
            'email' =>'admin@admin.com',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password' => Yii::$app->security->generatePasswordHash('T8vL3NpwiL'),
            'created_at' =>date('Y-m-d H-i-s'),
            'updated_at' =>date('Y-m-d H-i-s'),
            'ok_deleted' =>0,



        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240207_060306_add_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240207_060306_add_admin cannot be reverted.\n";

        return false;
    }
    */
}
