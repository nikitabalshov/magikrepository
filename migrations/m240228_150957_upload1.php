<?php

use yii\db\Migration;

/**
 * Class m240228_150957_upload1
 */
class m240228_150957_upload1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createIndex('idx-goods-brands_id','goods','brand_id');
        $this->createIndex('idx-goods-material_id','goods','material_id');
        $this->addForeignKey('fk-goods-material_id','goods','material_id','materials','id');
        $this->addForeignKey('fk-goods-brand_id','goods','brand_id','brands','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240228_150957_upload1 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240228_150957_upload1 cannot be reverted.\n";

        return false;
    }
    */
}
