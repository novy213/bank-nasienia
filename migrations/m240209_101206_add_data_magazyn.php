<?php

use yii\db\Migration;

/**
 * Class m240209_101206_add_data_magazyn
 */
class m240209_101206_add_data_magazyn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('magazyn', 'data_pobrania', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('magazyn', 'data_pobrania');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240209_101206_add_data_magazyn cannot be reverted.\n";

        return false;
    }
    */
}
