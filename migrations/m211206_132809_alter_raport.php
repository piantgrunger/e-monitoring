<?php

use yii\db\Migration;

/**
 * Class m211206_132809_alter_raport
 */
class m211206_132809_alter_raport extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('raport', 'file_raport', $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211206_132809_alter_raport cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211206_132809_alter_raport cannot be reverted.\n";

        return false;
    }
    */
}
