<?php

use yii\db\Migration;

class m180812_210643_update_table_dados_envio extends Migration
{
    public function up()
    {
        $this->addColumn('{{%dados_envio}}', 'telefone', $this->string(13));
    }

    public function down()
    {
        echo "m180812_210643_update_table_dados_envio cannot be reverted.\n";
        return false;
    }
}
