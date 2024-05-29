<?php

use yii\db\Migration;

class m240529_111115_widget_menu extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $this->createTable('{{%widget_menu}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(32)->notNull(),
            'title' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'title_ru' => $this->string()->notNull(),
            'title_uz' => $this->string()->notNull(),
            'items' => $this->text()->notNull(),
            'items_en' => $this->text()->notNull(),
            'items_ru' => $this->text()->notNull(),
            'items_uz' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)
        ]);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%widget_menu}}');
    }
}
