<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $idstatus
 * @property string $descricao
 *
 * @property HistoricosPedido[] $historicosPedidos
 * @property Pedidos[] $pedidos
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstatus' => 'Idstatus',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoricosPedidos()
    {
        return $this->hasMany(HistoricosPedido::className(), ['idstatus' => 'idstatus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['idstatus' => 'idstatus']);
    }
}
