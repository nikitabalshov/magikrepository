<?php

use yii\db\Migration;

/**
 * Class m240226_155630_brands
 */
class m240226_155630_brands extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('brands',[
            'id'=>$this->primaryKey(),
            'brands_ru'=>$this->string(50)->notNull(),
            'brands_en'=>$this->string(50)->notNull(),
            'brands_kz'=>$this->string(50)->notNull(),
            'photo'=>$this->string()->null(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240226_155630_brands cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240226_155630_brands cannot be reverted.\n";

        return false;
    }
    */
}
