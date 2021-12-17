<?php

use yii\db\Migration;

/**
 * Class m211217_060138_alter_kelas
 */
class m211217_060138_alter_kelas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%kelas}}', 'id_jenis_kelas', $this->integer()->notNull());
        $this->addForeignKey('fk-kelas-jenis_kelas', '{{%kelas}}', 'id_jenis_kelas', '{{%jenis_kelas}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_060138_alter_kelas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211217_060138_alter_kelas cannot be reverted.\n";

        return false;
    }
    */
}
