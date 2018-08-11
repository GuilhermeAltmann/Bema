<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kits".
 *
 * @property int $idkit
 * @property string $descricao
 *
 * @property Itens[] $itens
 * @property Pedidos[] $pedidos
 */
class Kits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkit' => 'Idkit',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItens()
    {
        return $this->hasMany(Itens::className(), ['idkit' => 'idkit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['idkit' => 'idkit']);
    }
}
