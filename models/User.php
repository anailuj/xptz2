<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $data_nascimento
 * @property string $cnh
 * @property string $telefone_fixo
 * @property string $celular
 * @property string $cpf
 * @property string $rg
 * @property string $foto
 * @property integer $fk_endereco
 *
 * @property Reserva[] $reservas
 * @property Veiculo[] $veiculos
 * @property Endereco $fkEndereco
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha', 'data_nascimento', 'cnh', 'celular', 'cpf', 'rg', 'fk_endereco'], 'required'],
            [['data_nascimento'], 'safe'],
            [['fk_endereco'], 'integer'],
            [['nome', 'senha'], 'string', 'max' => 80],
            [['email'], 'string', 'max' => 100],
            [['cnh', 'foto'], 'string', 'max' => 60],
            [['telefone_fixo', 'celular', 'cpf', 'rg'], 'string', 'max' => 20],
            [['fk_endereco'], 'exist', 'skipOnError' => true, 'targetClass' => Endereco::className(), 'targetAttribute' => ['fk_endereco' => 'id']],
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
            'email' => 'Email',
            'senha' => 'Senha',
            'data_nascimento' => 'Data Nascimento',
            'cnh' => 'Cnh',
            'telefone_fixo' => 'Telefone Fixo',
            'celular' => 'Celular',
            'cpf' => 'Cpf',
            'rg' => 'Rg',
            'foto' => 'Foto',
            'fk_endereco' => 'Fk Endereco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculos()
    {
        return $this->hasMany(Veiculo::className(), ['id' => 'veiculo_id'])->viaTable('reserva', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkEndereco()
    {
        return $this->hasOne(Endereco::className(), ['id' => 'fk_endereco']);
    }
}
