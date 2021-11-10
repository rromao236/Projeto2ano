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

        <div class="row">
            <div class="col-lg-10" style="text-align: center; border: 1px solid lightskyblue; margin-left: 100px;">
                <img size="" width="450px" height="auto" align="left" src="<?= yii\helpers\Url::to('@web/imgs/pacotePrincipal.png') ?>">
                <h3 style="text-align: left; margin-left: 460px;">Ponta delgada, Açores</h3>
                <p align="left" style="margin-left: 460px;">Venha desfrutar de uma férias fantásticas de 7 noites nos açores.</p>
                <p align="left" style="margin-left: 460px;">Rating: 4/5 Estrelas</p>
                <h4 align="right" style="margin-right: 110px;">Preço: 510€</h4>
                <div style="margin-right: -600px;">
                    <?= Html::a('Detalhes', ['/pacotes/detalhes'], ['class'=>'button button1']) ?>
                </div>
                <!--<p align="right" style="margin-right: 100px"><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Ver detalhes &raquo;</a></p>-->
            </div>
        </div>

    </div>

</div>
