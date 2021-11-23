<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'RAR Travels';

?>
<div class="site-index">


    <div class="jumbotron text-center bg-transparent" style="background-image: url(http://localhost/RARTravel/frontend/web/imgs/nuvens.png); background-size: cover">
        <h1 class="display-4" style="color: #ffffff">Bem-vindos!</h1>

        <br>

        <p><a class="btn btn-lg btn-success" style="background-color: #ffffff; border: #005cbf; color: #005cbf" href="http://www.yiiframework.com">Ver pacotes</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4" style="text-align: center">
                <h2 style="text-align: center"><?php echo $pacote1->title; ?></h2>
                <img size="" width="400px" height="260" src="<?= yii\helpers\Url::to('@web/imgs/lisboa.jpg') ?>">
                <p></p>
                <?= Html::a('Ver detalhes', ['', 'id' => $pacote1->id], ['class' => 'btn btn-primary']) ?>
                <p></p>
            </div>
            <div class="col-lg-4" style="text-align: center">
                <h2 style="text-align: center"><?php echo $pacote2->title; ?></h2>
                <img size="" width="400px" height="260" src="<?= yii\helpers\Url::to('@web/imgs/londres.jpg') ?>">
                <p></p>
                <?= Html::a('Ver detalhes', ['', 'id' => $pacote2->id], ['class' => 'btn btn-primary']) ?>
                <p></p>
            </div>
            <div class="col-lg-4" style="text-align: center">
                <h2 style="text-align: center"><?php echo $pacote3->title; ?></h2>
                <img size="" width="400px" height="260" src="<?= yii\helpers\Url::to('@web/imgs/paris.jpg') ?>">
                <p></p>
                <?= Html::a('Ver detalhes', ['', 'id' => $pacote3->id], ['class' => 'btn btn-primary']) ?>
                <p></p>
            </div>
        </div>

    </div>
</div>
