<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historicos_pedido".
 *
 * @property int $idhistorico_pedido
 * @property int $idstatus
 * @property int $idpedido
 * @property string $data_hora
 *
 * @property Pedidos $pedido
 * @property Status $status
 */
class HistoricosPedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historicos_pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idstatus', 'idpedido'], 'required'],
            [['idstatus', 'idpedido'], 'integer'],
            [['data_hora'], 'safe'],
            [['idpedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['idpedido' => 'idpedido']],
            [['idstatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['idstatus' => 'idstatus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idhistorico_pedido' => 'Idhistorico Pedido',
            'idstatus' => 'Idstatus',
            'idpedido' => 'Idpedido',
            'data_hora' => 'Data Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['idstatus' => 'idstatus']);
    }
}
