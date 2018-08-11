<?php

use yii\db\Migration;

class m180811_124143_create_table_status extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%status}}', [
            'idstatus' => $this->primaryKey(),
            'descricao' => $this->string(40),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%status}}');
    }
}
