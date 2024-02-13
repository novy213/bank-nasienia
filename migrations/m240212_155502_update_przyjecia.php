<?php

use yii\db\Migration;

/**
 * Class m240212_155502_update_przyjecia
 */
class m240212_155502_update_przyjecia extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('historia_transakcji_przyjecia', 'buhaj_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240212_155502_update_przyjecia cannot be reverted.\n";

        return false;
    }
    */
}
