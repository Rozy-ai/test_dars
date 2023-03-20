<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230317_111435_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'role' =>  Schema::TYPE_TINYINT . ' NOT NULL DEFAULT 0',
        ]);
        $this->insert('{{%users}}', [
            'login' => 'admin',
            'password' => '12345',
            'role' => '1'
        ]);
        $this->insert('{{%users}}', [
            'login' => 'client',
            'password' => '12345',
            'role' => '0'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%users}}', ['id' => 1]);
        $this->delete('{{%users}}', ['id' => 2]);
        $this->dropTable('{{%users}}');
    }
}
