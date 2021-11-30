<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guru}}`.
 */
class m211130_091453_create_guru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guru}}', [
            'id_guru' => $this->primaryKey(),
            'nama_guru' => $this->string(100)->notNull(),
            'alamat' => $this->text()->notNull(),
            'no_hp' => $this->string(20),
            'jenis_kelamin' => $this->string(10)->notNull(),
            'username' => $this->string(100)->notNull(),
            'password' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guru}}');
    }
}
