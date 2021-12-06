<?php

use yii\db\Migration;

/**
 * Class m211206_070046_create_murid_kelas
 */
class m211206_070046_create_murid_kelas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kelas', [
            'id_kelas' => $this->primaryKey(),
            'id_murid' => $this->integer()->notNull(),
            'id_guru' => $this->integer()->notNull(),
        ]);
    
        $this->addForeignKey('fk-murid-kelas', 'kelas', 'id_murid', 'murid', 'id_murid', 'CASCADE');
        $this->addForeignKey('fk-guru-kelas', 'kelas', 'id_guru', 'guru', 'id_guru', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('kelas') ;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211206_070046_create_murid_kelas cannot be reverted.\n";

        return false;
    }
    */
}
