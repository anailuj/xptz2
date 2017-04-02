<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="../../web/css/general.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?><div class="flex-container">
    <header class="flex-item header">Header</header>
    <div class="flex-item sidebar">
        <nav>
            <ul>
                <li>Locar veículo</li>
                <li>Histórico de locação</li>
                <li>Atualizar dados pessoais</li>
                <li>Sair</li>
            </ul>
        </nav>
    </div>
    <div class="flex-item main">Main</div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
