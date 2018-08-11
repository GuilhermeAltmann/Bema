<?php

use yii\db\Migration;

/**
 * Class m180811_124347_indexes
 */
class m180811_124347_indexes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createIndex('fk_dados_envio_pedidos1_idx', '{{%dados_envio}}', 'idpedido');
        $this->createIndex('fk_dados_envio_estados1_idx', '{{%dados_envio}}', 'idestado');
        $this->addForeignKey('fk_dados_envio_estados1', '{{%dados_envio}}', 'idestado', '{{%estados}}', 'idestado', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_dados_envio_pedidos1', '{{%dados_envio}}', 'idpedido', '{{%pedidos}}', 'idpedido', 'NO ACTION', 'NO ACTION');
        
        $this->createIndex('fk_estados_paises_idx', '{{%estados}}', 'idpais');
        $this->addForeignKey('fk_estados_paises', '{{%estados}}', 'idpais', '{{%paises}}', 'idpais', 'NO ACTION', 'NO ACTION');

        $this->createIndex('fk_historicos_pedido_pedidos1_idx', '{{%historicos_pedido}}', 'idpedido');
        $this->createIndex('fk_historicos_pedido_status1_idx', '{{%historicos_pedido}}', 'idstatus');
        $this->addForeignKey('fk_historicos_pedido_pedidos1', '{{%historicos_pedido}}', 'idpedido', '{{%pedidos}}', 'idpedido', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_historicos_pedido_status1', '{{%historicos_pedido}}', 'idstatus', '{{%status}}', 'idstatus', 'NO ACTION', 'NO ACTION');      
        
        $this->createIndex('fk_pedidos_status1_idx', '{{%pedidos}}', 'idstatus');
        $this->addForeignKey('fk_pedidos_status1', '{{%pedidos}}', 'idstatus', '{{%status}}', 'idstatus', 'NO ACTION', 'NO ACTION');       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180811_124347_indexes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        
    }

    public function down()
    {
        echo "m180811_124347_indexes cannot be reverted.\n";

        return false;
    }
    */
}
