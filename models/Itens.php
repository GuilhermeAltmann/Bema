<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itens".
 *
 * @property int $iditem
 * @property string $descricao
 * @property string $imagem
 * @property int $idkit
 *
 * @property Kits $kit
 */
class Itens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'idkit'], 'required'],
            [['idkit'], 'integer'],
            [['descricao', 'imagem'], 'string', 'max' => 255],
            [['idkit'], 'exist', 'skipOnError' => true, 'targetClass' => Kits::className(), 'targetAttribute' => ['idkit' => 'idkit']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iditem' => 'Iditem',
            'descricao' => 'Descricao',
            'imagem' => 'Imagem',
            'idkit' => 'Idkit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKit()
    {
        return $this->hasOne(Kits::className(), ['idkit' => 'idkit']);
    }
}
