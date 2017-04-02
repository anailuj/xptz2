<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VeiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="veiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'placa') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'ano_fabricacao') ?>

    <?php // echo $form->field($model, 'ano_modelo') ?>

    <?php // echo $form->field($model, 'portas') ?>

    <?php // echo $form->field($model, 'chassi') ?>

    <?php // echo $form->field($model, 'ar_condicionado') ?>

    <?php // echo $form->field($model, 'cambio_automatico') ?>

    <?php // echo $form->field($model, 'direcao_hidraulica') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
