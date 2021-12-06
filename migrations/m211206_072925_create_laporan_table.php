<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laporan}}`.
 */
class m211206_072925_create_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laporan}}', [
            'id_laporan' => $this->primaryKey(),
            'laporan'   => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laporan}}');
    }
}
