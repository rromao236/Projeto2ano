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
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 150px;
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
        .buttonBuy {
            background-color: white;
            color: black;
            border: 2px solid blue;
        }

        .buttonBuy:hover {
            background-color: blue;
            color: white;
        }
        .buttonCancel {
            background-color: white;
            color: black;
            border: 2px solid red;
        }

        .buttonCancel:hover {
            background-color: red;
            color: white;
        }
    </style>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align: center;">Informações de pagamento</h2>
                <div style="margin-left: 290px;">
                    <p>Pacote: Ponta delgada, Açores</p>
                    <p>Valor a pagar: 510€</p>
                    <p>Entidade: 11236</p>
                    <p>Referencia: 963162396</p>
                    <p>Pontos que pretende usar:</p><input type="text" id="pontos" name="pontos" value="0">
                    <?= Html::a('Usar', ['/pacotes/detalhes'], ['class'=>'button button1']) ?>
                    <h4><br>Total a pagar: 510€</h4>
                    <?= Html::a('CONFIRMAR', ['/pacotes/detalhes'], ['class'=>'button buttonBuy']) ?>
                    <?= Html::a('CANCELAR', ['/pacotes/detalhes'], ['class'=>'button buttonCancel']) ?>
                </div>
            </div>
        </div>

    </div>

</div>
