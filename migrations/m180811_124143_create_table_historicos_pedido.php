<?php

use yii\db\Migration;

class m180811_124143_create_table_historicos_pedido extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%historicos_pedido}}', [
            'idhistorico_pedido' => $this->primaryKey(),
            'idstatus' => $this->integer()->notNull(),
            'idpedido' => $this->integer()->notNull(),
            'data_hora' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%historicos_pedido}}');
    }
}
