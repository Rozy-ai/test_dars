<?php

use yii\db\Migration;
use yii\db\Schema;


/**
 * Handles the creation of table `{{%tbl_genres_books}}`.
 */
class m230317_112756_create_tbl_genres_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_genres_books}}', [
            'id' => $this->primaryKey(),
            'book_id' => Schema::TYPE_INTEGER . ' UNSIGNED',
            'genre_id' => Schema::TYPE_INTEGER . ' UNSIGNED',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tbl_genres_books}}');
    }
}
