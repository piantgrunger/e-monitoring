<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%absen}}`.
 */
class m211206_080319_create_absen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%absensi}}', [
            'id_absensi' => $this->primaryKey(),
            'tgl_absensi' => $this->date()->notNull(),
            'id_murid' => $this->integer()->notNull(),
            'status_kehadiran' => $this->string(10)->notNull(),
        ]);
        $this->addForeignKey(
            'fk-absensi-id_murid',
            'absensi',
            'id_murid',
            'murid',
            'id_murid',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%absensi}}');
    }
}
