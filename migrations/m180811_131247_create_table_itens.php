<?php

use yii\db\Migration;

class m180811_131247_create_table_itens extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%itens}}', [
            'iditem' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
            'imagem' => $this->string(),
            'idkit' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%itens}}');
    }
}
