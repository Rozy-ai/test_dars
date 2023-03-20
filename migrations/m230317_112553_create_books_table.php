<?php

use yii\db\Migration;
use yii\db\Schema;


/**
 * Handles the creation of table `{{%books}}`.
 */
class m230317_112553_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' UNSIGNED',
            'date_created' => Schema::TYPE_DATETIME . ' DEFAULT CURRENT_TIMESTAMP',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
