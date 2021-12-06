<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%raport}}`.
 */
class m211206_123608_create_raport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%raport}}', [
            'id_raport' => $this->primaryKey(),
            'id_murid' => $this->integer()->notNull(),
            'hasil_raport' => $this->text()->notNull(),
            'file_raport' => $this->string(255)->notNull(),

        ]);
        $this->addForeignKey(
            'fk-raport-id_murid',
            'raport',
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
        $this->dropTable('{{%raport}}');
    }
}
