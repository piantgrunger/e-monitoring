<?php

use yii\db\Migration;

/**
 * Class m211206_083231_alter_user
 */
class m211206_083231_alter_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'jenis_user', $this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211206_083231_alter_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211206_083231_alter_user cannot be reverted.\n";

        return false;
    }
    */
}
