<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kelas}}`.
 */
class m211217_055345_create_kelas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jenis_kelas}}', [
            'id' => $this->primaryKey(),
            'nama_kelas' => $this->string(100)->notNull()->unique()  ,
            'keterangan' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jenis_kelas}}');
    }
}
