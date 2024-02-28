<?php

use yii\db\Migration;

/**
 * Class m240227_061315_goods
 */
class m240227_061315_goods extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('goods',[
            'id'=>$this->primaryKey(),
            'name_ru'=>$this->string()->notNull(),
            'name_kz'=>$this->string()->notNull(),
            'name_en'=>$this->string()->notNull(),
            'description_ru'=>$this->string()->notNull(),
            'description_kz'=>$this->string()->notNull(),
            'description_en'=>$this->string()->notNull(),
            'cost'=>$this->integer()->notNull(),
            'country_id'=>$this->integer()->notNull(),
            'city_id'=>$this->integer()->notNull(),
            'color'=>$this->string()->notNull(),
            'brand_id'=>$this->integer()->notNull(),
            'material_id'=>$this->integer()->notNull(),
            'category_id'=>$this->integer()->notNull(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240227_061315_goods cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_061315_goods cannot be reverted.\n";

        return false;
    }
    */
}
