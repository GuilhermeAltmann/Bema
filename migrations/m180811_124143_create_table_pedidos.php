<?php

use yii\db\Migration;

class m180811_124143_create_table_pedidos extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pedidos}}', [
            'idpedido' => $this->primaryKey(),
            'contrato_licenca' => $this->string(20),
            'preco' => $this->decimal(7,2),
            'data_hora_criacao' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'numero_nfe' => $this->string(45),
            'data_hora_emissao_nfe' => $this->dateTime(),
            'idstatus' => $this->integer()->notNull(),
            'idkit' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%pedidos}}');
    }
}
