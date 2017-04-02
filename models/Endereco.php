<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property integer $id
 * @property string $cep
 * @property string $estado
 * @property string $cidade
 * @property string $bairro
 * @property string $logradouro
 * @property integer $numero
 * @property integer $complemento
 *
 * @property User[] $users
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cep', 'estado', 'cidade', 'bairro', 'logradouro', 'numero'], 'required'],
            [['numero', 'complemento'], 'integer'],
            [['cep'], 'string', 'max' => 10],
            [['estado', 'cidade', 'bairro', 'logradouro'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cep' => 'Cep',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
            'bairro' => 'Bairro',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['fk_endereco' => 'id']);
    }
}
