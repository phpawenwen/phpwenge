<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180318_084247_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            //'tree' => $this->integer()->notNull(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull()->comment('深度'),
            'name' => $this->string()->notNull(),
            'panten_id'=>$this->string()->notNull()->comment('父类id'),
            'intor'=>$this->string()->notNull(),
            'tree'=>$this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
