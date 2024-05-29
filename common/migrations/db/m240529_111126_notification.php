<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notification}}`.
 */
class m240529_111126_notification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(1024)->notNull(),
            'status' => $this->boolean()->defaultValue(false),
            'notification_type' => $this->string(255),
            'post' => $this->integer(),
            'created_at' => $this->integer(),
        ]);
        $this->createIndex('user_id', '{{%notification}}', ['user_id'], false);
        $this->addForeignKey('fk_notification_user_id',
            '{{%notification}}', 'user_id',
            '{{%user}}', 'id',
            'RESTRICT', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_notification_user_id', '{{%notification}}');
        $this->dropIndex('user_id', '{{%notification}}');
        $this->dropTable('{{%notification}}');
    }
}
