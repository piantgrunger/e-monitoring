<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pesan}}`.
 */
class m211208_043236_create_pesan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pesan}}', [
            'id_pesan' => $this->primaryKey(),
            'id_penerima' => $this->integer()->notNull(),
            'id_pengirim' => $this->integer()->notNull(),
            'pesan' => $this->text()->notNull(),
        ]);
        $this->addForeignKey('fk_pesan_penerima', 'pesan', 'id_penerima', 'user', 'id');
        $this->addForeignKey('fk_pesan_pengirim', 'pesan', 'id_pengirim', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pesan}}');
    }
}
