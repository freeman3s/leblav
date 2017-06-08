<?php

use yii\db\Migration;

/**
 * Handles the creation of table `flat`.
 */
class m170608_091736_create_flat_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('flat', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull(),
            'photo' => $this->string(128)->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'address' => $this->string(128)->notNull(),
            'description' => $this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('flat');
    }
}
