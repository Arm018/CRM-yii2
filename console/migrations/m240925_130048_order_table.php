<?php

use yii\db\Migration;

/**
 * Class m240925_130048_order_table
 */
class m240925_130048_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'order_name' => $this->string()->notNull(),
            'product_name' => $this->string()->notNull(),
            'phone' => $this->string(20)->notNull(),
            'status' => $this->string()->notNull(),
            'comment' => $this->text(),
            'price' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240925_130048_order_table cannot be reverted.\n";

        return false;
    }
    */
}
