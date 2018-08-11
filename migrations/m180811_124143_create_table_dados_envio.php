<?php

use yii\db\Migration;

class m180811_124143_create_table_dados_envio extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%dados_envio}}', [
            'iddados_envio' => $this->primaryKey(),
            'cnpj' => $this->string(14)->notNull(),
            'endereco' => $this->string()->notNull(),
            'cep' => $this->string(9)->notNull(),
            'comentario' => $this->text(),
            'idestado' => $this->integer()->notNull(),
            'idpedido' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%dados_envio}}');
    }
}
