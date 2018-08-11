<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property int $idestado
 * @property string $descricao
 * @property int $idpais
 *
 * @property DadosEnvio[] $dadosEnvios
 * @property Paises $pais
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpais'], 'required'],
            [['idpais'], 'integer'],
            [['descricao'], 'string', 'max' => 75],
            [['idpais'], 'exist', 'skipOnError' => true, 'targetClass' => Paises::className(), 'targetAttribute' => ['idpais' => 'idpais']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestado' => 'Idestado',
            'descricao' => 'Descricao',
            'idpais' => 'Idpais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosEnvios()
    {
        return $this->hasMany(DadosEnvio::className(), ['idestado' => 'idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Paises::className(), ['idpais' => 'idpais']);
    }
}
