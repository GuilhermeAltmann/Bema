<?php

use yii\db\Migration;

class m180811_131253_create_table_kits extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%kits}}', [
            'idkit' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_pedidos_kits1', '{{%pedidos}}', 'idkit', '{{%kits}}', 'idkit', 'NO ACTION', 'NO ACTION');
        $this->createIndex('fk_pedidos_kits1_idx', '{{%pedidos}}', 'idkit'); 

        $this->createIndex('fk_itens_kit1_idx', '{{%itens}}', 'idkit');
        $this->addForeignKey('fk_itens_kit1', '{{%itens}}', 'idkit', '{{%kits}}', 'idkit', 'NO ACTION', 'NO ACTION');

    }

    public function down()
    {
        $this->dropTable('{{%kits}}');
    }
}
