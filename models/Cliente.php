<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nome
 * @property string $data_nascimento
 * @property string $cnh
 * @property string $telefone_fixo
 * @property string $celular
 * @property string $cpf
 * @property string $rg
 * @property string $foto
 * @property integer $endereco_id
 * @property integer $user_id
 *
 * @property Endereco $endereco
 * @property User $user
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'data_nascimento', 'cnh', 'celular', 'cpf', 'rg', 'endereco_id', 'user_id'], 'required'],
            [['data_nascimento'], 'safe'],
            [['endereco_id', 'user_id'], 'integer'],
            [['nome'], 'string', 'max' => 80],
            [['cnh', 'foto'], 'string', 'max' => 60],
            [['telefone_fixo', 'celular', 'cpf', 'rg'], 'string', 'max' => 20],
            [['endereco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Endereco::className(), 'targetAttribute' => ['endereco_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'data_nascimento' => 'Data Nascimento',
            'cnh' => 'Cnh',
            'telefone_fixo' => 'Telefone Fixo',
            'celular' => 'Celular',
            'cpf' => 'Cpf',
            'rg' => 'Rg',
            'foto' => 'Foto',
            'endereco_id' => 'Endereco ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndereco()
    {
        return $this->hasOne(Endereco::className(), ['id' => 'endereco_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
