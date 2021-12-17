<?php

use yii\db\Migration;

/**
 * Class m211217_054034_alter_murid
 */
class m211217_054034_alter_murid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%murid}}', 'nisn', $this->string()->notNull()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_054034_alter_murid cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211217_054034_alter_murid cannot be reverted.\n";

        return false;
    }
    */
}
