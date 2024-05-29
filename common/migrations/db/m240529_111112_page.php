<?php

use yii\db\Migration;

class m240529_111112_page extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(2048)->notNull(),
            'title' => $this->string(512)->notNull(),
            'title_en' => $this->string(512)->notNull(),
            'title_ru' => $this->string(512)->notNull(),
            'title_uz' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
            'body_en' => $this->text()->notNull(),
            'body_ru' => $this->text()->notNull(),
            'body_uz' => $this->text()->notNull(),
            'view' => $this->string(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%page}}');
    }
}
