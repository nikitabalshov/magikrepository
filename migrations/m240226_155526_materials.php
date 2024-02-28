<?php

use yii\db\Migration;

/**
 * Class m240226_155526_materials
 */
class m240226_155526_materials extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('materials',[
            'id'=>$this->primaryKey(),
            'materials_ru'=>$this->string()->notNull(),
            'materials_en'=>$this->string()->notNull(),
            'materials_kz'=>$this->string()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240226_155526_materials cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240226_155526_materials cannot be reverted.\n";

        return false;
    }
    */
}
