<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m240529_111128_add_language_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'language_id', $this->integer());
        $this->addForeignKey(
            'FK_user_language_id',
            '{{%user}}',
            'language_id',
            '{{%language}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_user_language_id',
            '{{%user}}');
        $this->dropColumn('{{%user}}', 'language_id');
    }
}
