<?php

use yii\db\Migration;

/**
 * Class m240926_073645_order_history_table
 */
class m240926_073645_order_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_history}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'attribute' => $this->string()->notNull(),
            'old_value' => $this->text()->notNull(),
            'new_value' => $this->text()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            '{{%idx-order_history-order_id}}',
            '{{%order_history}}',
            'order_id'
        );

        $this->addForeignKey(
            '{{%fk-order_history-order_id}}',
            '{{%order_history}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-order_history-order_id}}', '{{%order_history}}');
        $this->dropIndex('{{%idx-order_history-order_id}}', '{{%order_history}}');

        $this->dropTable('{{%order_history}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240926_073645_order_history_table cannot be reverted.\n";

        return false;
    }
    */
}
