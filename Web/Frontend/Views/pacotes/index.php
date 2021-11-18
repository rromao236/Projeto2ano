<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'RAR Travels';
?>
<div class="site-index">

    <style>
        .button {
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 200px;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #dbf3fa;
        }

        .button1:hover {
            background-color: #dbf3fa;
            color: black;
        }
    </style>

    <div class="body-content">
        <?php foreach ($pacotes as $pacote){?>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <img size="" width="420px" height="auto" align="left" style="margin-left: 100px" src="<?= yii\helpers\Url::to('@web/imgs/pacotePrincipal.png') ?>">
                    <h3 style="text-align: left; margin-left: 540px;"><?php echo $pacote->title; ?></h3>
                    <p align="left" style="margin-left: 540px;"><?php echo $pacote->description; ?></p>
                    <p align="left" style="margin-left: 540px;">Rating: <?php echo $pacote->rating; ?></p>
                    <h4 align="right" style="margin-right: 520px;">Preço: <?php echo $pacote->price; ?></h4>

                    <?= Html::a('Detalhes', ['/pacotes/detalhes'], ['class'=>'button button1']) ?>
                    <!--<p align="right" style="margin-right: 100px"><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Ver detalhes &raquo;</a></p>-->
                </div>
            </div>
        <?php }?>
    </div>


</div>
