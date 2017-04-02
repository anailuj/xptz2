<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property integer $cliente_id
 * @property integer $veiculo_id
 * @property string $data_reserva
 * @property string $data_devolucao
 *
 * @property Veiculo $veiculo
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'veiculo_id', 'data_reserva'], 'required'],
            [['cliente_id', 'veiculo_id'], 'integer'],
            [['data_reserva', 'data_devolucao'], 'string', 'max' => 45],
            [['veiculo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::className(), 'targetAttribute' => ['veiculo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cliente_id' => 'Cliente ID',
            'veiculo_id' => 'Veiculo ID',
            'data_reserva' => 'Data Reserva',
            'data_devolucao' => 'Data Devolucao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculo()
    {
        return $this->hasOne(Veiculo::className(), ['id' => 'veiculo_id']);
    }
}
