<?php

use yii\db\Migration;

class m180811_124143_create_table_paises extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%paises}}', [
            'idpais' => $this->primaryKey(),
            'descricao' => $this->string(75),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%paises}}');
    }
}
