<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%agenda}}`.
 */
class m211221_060730_create_agenda_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%agenda}}', [
            'id' => $this->primaryKey(),
            'tanggal' => $this->date()->notNull(),
            'agenda' => $this->text()->notNull(),
            'file' => $this->string(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%agenda}}');
    }
}
