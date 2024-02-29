<?php

use yii\db\Migration;

/**
 * Class m240229_074516_goods_material
 */
class m240229_074516_goods_material extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('goods_materials',[
            'id'=>$this->primaryKey(),
            'goods_id'=>$this->integer()->notNull(),
            'material-id'=>$this->integer()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240229_074516_goods_material cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240229_074516_goods_material cannot be reverted.\n";

        return false;
    }
    */
}
