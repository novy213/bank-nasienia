x<?php

use yii\db\Migration;

/**
 * Class m240206_093043_add_self_updates
 */
class m240206_093043_add_self_updates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('version', [
            'version'=>$this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('version');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240206_093043_add_self_updates cannot be reverted.\n";

        return false;
    }
    */
}
