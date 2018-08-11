<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_envio".
 *
 * @property int $iddados_envio
 * @property string $cnpj
 * @property string $endereco
 * @property string $cep
 * @property string $comentario
 * @property int $idestado
 * @property int $idpedido
 *
 * @property Estados $estado
 * @property Pedidos $pedido
 */
class DadosEnvio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dados_envio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cnpj', 'endereco', 'cep', 'idestado', 'idpedido'], 'required'],
            [['comentario'], 'string'],
            [['idestado', 'idpedido'], 'integer'],
            [['cnpj'], 'string', 'max' => 14],
            [['endereco'], 'string', 'max' => 255],
            [['cep'], 'string', 'max' => 9],
            [['idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['idestado' => 'idestado']],
            [['idpedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['idpedido' => 'idpedido']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddados_envio' => 'Iddados Envio',
            'cnpj' => 'Cnpj',
            'endereco' => 'Endereco',
            'cep' => 'Cep',
            'comentario' => 'Comentario',
            'idestado' => 'Idestado',
            'idpedido' => 'Idpedido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estados::className(), ['idestado' => 'idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::className(), ['idpedido' => 'idpedido']);
    }
}
