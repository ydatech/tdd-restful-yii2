<?php

use yii\db\Migration;

/**
 * Handles the creation of table `todo`.
 */
class m170825_160023_create_todo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('todo', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'completed' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('todo');
    }
}
