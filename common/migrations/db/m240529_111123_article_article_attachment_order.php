<?php

use yii\db\Migration;

class m240529_111123_article_article_attachment_order extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $this->addColumn('{{%article}}', 'order', $this->integer());
        $this->addColumn('{{%article_attachment}}', 'order', $this->integer());
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropColumn('{{%article}}', 'order');
        $this->dropColumn('{{%article_attachment}}', 'order');
    }
}
