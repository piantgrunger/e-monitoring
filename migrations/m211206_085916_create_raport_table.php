<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%raport}}`.
 */
class m211206_085916_create_raport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%report}}', [
            'id_report' => $this->primaryKey(),
            'id_murid' => $this->integer()->notNull(),
            'tgl_report' => $this->date()->notNull(),
            'hasil_report' => $this->text()->notNull(),

        ]);

        $this->createIndex(
            'idx-report-id_murid',
            'report',
            'id_murid'
        );
        $this->addForeignKey(
            'fk-report-id_murid',
            'report',
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
        $this->dropTable('{{%report}}');
    }
}
