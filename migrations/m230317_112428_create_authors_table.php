<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m230317_112428_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'country' => Schema::TYPE_STRING ,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%authors}}');
    }
}
