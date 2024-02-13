<?php

use yii\db\Migration;

/**
 * Class m240213_072840_fix_przyjecia
 */
class m240213_072840_fix_przyjecia extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> alterColumn('historia_transakcji_przyjecia','buhaj_id', $this->integer());
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
        echo "m240213_072840_fix_przyjecia cannot be reverted.\n";

        return false;
    }
    */
}
