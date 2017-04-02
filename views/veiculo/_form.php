<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Veiculo */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'placa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ano_fabricacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ano_modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portas')->textInput() ?>

    <?= $form->field($model, 'chassi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ar_condicionado')->textInput() ?>

    <?= $form->field($model, 'cambio_automatico')->textInput() ?>

    <?= $form->field($model, 'direcao_hidraulica')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>


        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


    <?php ActiveForm::end(); ?>

</div>
