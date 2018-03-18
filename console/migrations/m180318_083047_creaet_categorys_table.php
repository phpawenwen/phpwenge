<?php

use yii\db\Migration;

/**
 * Class m180318_083047_creaet_categorys_table
 */
class m180318_083047_creaet_categorys_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categorys', [
            'id' => $this->primaryKey(),
            'tree' => $this->integer()->notNull(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull()->comment('深度'),
            'name' => $this->string()->notNull(),
            'intor'=>$this->string()->notNull(),
            'panten_id'=>$this->string()->notNull()->defaultValue('0')->comment('父类id')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180318_083047_creaet_categorys_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180318_083047_creaet_categorys_table cannot be reverted.\n";

        return false;
    }
    */
}
