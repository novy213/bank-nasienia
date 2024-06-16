<?php

use yii\db\Migration;

/**
 * Class m240616_175018_add_data_pobrania
 */
class m240616_175018_add_data_pobrania extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('data_pobrania_zapis', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'archiwum_id' => $this->integer(),
            'data' => $this->text(),
            'ilosc' => $this->integer(),
        ]);
        $this -> alterColumn('data_pobrania_zapis','id', $this->integer().' AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('data_pobrania_zapis');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240616_175018_add_data_pobrania cannot be reverted.\n";

        return false;
    }
    */
}
