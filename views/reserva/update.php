<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */

$this->title = 'Update Reserva: ' . $model->cliente_id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cliente_id, 'url' => ['view', 'cliente_id' => $model->cliente_id, 'veiculo_id' => $model->veiculo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reserva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
