<?php

use yii\db\Migration;

/**
 * Class m211217_083322_alter_laporan
 */
class m211217_083322_alter_laporan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%laporan}}', 'file_laporan', $this->string());
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_083322_alter_laporan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211217_083322_alter_laporan cannot be reverted.\n";

        return false;
    }
    */
}
