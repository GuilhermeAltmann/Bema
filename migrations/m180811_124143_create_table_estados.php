<?php

use yii\db\Migration;

class m180811_124143_create_table_estados extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%estados}}', [
            'idestado' => $this->primaryKey(),
            'descricao' => $this->string(75),
            'idpais' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%estados}}');
    }
}
