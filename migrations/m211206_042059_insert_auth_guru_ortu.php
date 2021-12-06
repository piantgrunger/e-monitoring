<?php

use yii\db\Migration;

/**
 * Class m211206_042059_insert_auth_guru_ortu
 */
class m211206_042059_insert_auth_guru_ortu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', ['name' => 'guru', 'type' => 1, 'description' => 'Guru', 'data' => null, 'created_at' => time(), 'updated_at' => time()]);
        $this->insert('auth_item', ['name' => 'ortu', 'type' => 1, 'description' => 'Orang Tua', 'data' => null, 'created_at' => time(), 'updated_at' => time()]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211206_042059_insert_auth_guru_ortu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211206_042059_insert_auth_guru_ortu cannot be reverted.\n";

        return false;
    }
    */
}
