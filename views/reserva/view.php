<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */

$this->title = $model->cliente_id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cliente_id' => $model->cliente_id, 'veiculo_id' => $model->veiculo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cliente_id' => $model->cliente_id, 'veiculo_id' => $model->veiculo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cliente_id',
            'veiculo_id',
            'data_reserva',
            'data_devolucao',
        ],
    ]) ?>

</div>
