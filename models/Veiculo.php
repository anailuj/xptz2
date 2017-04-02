<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property integer $id
 * @property string $placa
 * @property string $marca
 * @property string $modelo
 * @property string $ano_fabricacao
 * @property string $ano_modelo
 * @property integer $portas
 * @property string $chassi
 * @property integer $ar_condicionado
 * @property integer $cambio_automatico
 * @property integer $direcao_hidraulica
 * @property integer $status
 *
 * @property Reserva[] $reservas
 * @property User[] $users
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['placa', 'marca', 'modelo', 'ano_fabricacao', 'ano_modelo', 'portas', 'chassi', 'ar_condicionado', 'cambio_automatico', 'direcao_hidraulica', 'status'], 'required'],
            [['ano_fabricacao', 'ano_modelo'], 'safe'],
            [['portas', 'ar_condicionado', 'cambio_automatico', 'direcao_hidraulica', 'status'], 'integer'],
            [['placa'], 'string', 'max' => 8],
            [['marca'], 'string', 'max' => 80],
            [['modelo'], 'string', 'max' => 100],
            [['chassi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'placa' => 'Placa',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'ano_fabricacao' => 'Ano Fabricacao',
            'ano_modelo' => 'Ano Modelo',
            'portas' => 'Portas',
            'chassi' => 'Chassi',
            'ar_condicionado' => 'Ar Condicionado',
            'cambio_automatico' => 'Cambio Automatico',
            'direcao_hidraulica' => 'Direcao Hidraulica',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['veiculo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('reserva', ['veiculo_id' => 'id']);
    }
}
