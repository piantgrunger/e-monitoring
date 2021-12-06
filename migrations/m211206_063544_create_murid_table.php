<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%murid}}`.
 */
class m211206_063544_create_murid_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%murid}}', [
            'id_murid' => $this->primaryKey(),
            'nama_murid' => $this->string(100)->notNull(),
            'nama_walimurid' => $this->string(100)->notNull(),
            'alamat' => $this->text()->notNull(),
            'no_hp' => $this->string(20),
            'jenis_kelamin' => $this->string(10)->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'tempat_lahir' => $this->string(100)->notNull(),
            'username' => $this->string(100)->notNull(),
            'password' => $this->string(100)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%murid}}');
    }
}
