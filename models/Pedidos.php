<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $idpedido
 * @property string $contrato_licenca
 * @property string $preco
 * @property string $data_hora_criacao
 * @property string $numero_nfe
 * @property string $data_hora_emissao_nfe
 * @property int $idstatus
 * @property int $idkit
 *
 * @property DadosEnvio[] $dadosEnvios
 * @property HistoricosPedido[] $historicosPedidos
 * @property Kits $kit
 * @property Status $status
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco'], 'number'],
            [['data_hora_criacao', 'data_hora_emissao_nfe'], 'safe'],
            [['idstatus', 'idkit'], 'required'],
            [['idstatus', 'idkit'], 'integer'],
            [['contrato_licenca'], 'string', 'max' => 20],
            [['numero_nfe'], 'string', 'max' => 45],
            [['idkit'], 'exist', 'skipOnError' => true, 'targetClass' => Kits::className(), 'targetAttribute' => ['idkit' => 'idkit']],
            [['idstatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['idstatus' => 'idstatus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpedido' => 'Idpedido',
            'contrato_licenca' => 'Contrato Licenca',
            'preco' => 'Preco',
            'data_hora_criacao' => 'Data Hora Criacao',
            'numero_nfe' => 'Numero Nfe',
            'data_hora_emissao_nfe' => 'Data Hora Emissao Nfe',
            'idstatus' => 'Idstatus',
            'idkit' => 'Idkit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosEnvios()
    {
        return $this->hasMany(DadosEnvio::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoricosPedidos()
    {
        return $this->hasMany(HistoricosPedido::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKit()
    {
        return $this->hasOne(Kits::className(), ['idkit' => 'idkit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['idstatus' => 'idstatus']);
    }
}
