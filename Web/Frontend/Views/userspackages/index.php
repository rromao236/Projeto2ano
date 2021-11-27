<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Historico';
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['usersinfo/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <div class="body-content container">
        <table style="width:100%">
            <tr align="center">
                <th>Pacote</th>
                <th>Data de compra</th>
                <th>Estado</th>
                <th>Entidade</th>
                <th>Referencia</th>
                <th>Valor</th>
            </tr>
                <?php foreach ($pacotesC AS $pacoteC){ ?>
                    <?php foreach ($pacotes as $pacote){?>
                        <tr>
                            <td align="center"><?= $pacote->title ?></td>
                            <td align="center"><?= $pacoteC->purchasedate ?></td>
                            <td align="center"><?= $pacoteC->estado ?></td>
                            <td align="center"><?= $pacoteC->entity ?></td>
                            <td align="center"><?= $pacoteC->referencia ?></td>
                            <td align="center"><?= $pacoteC->price ?></td>
                            <td align="center"><?= Html::a('Ver detalhes', ['pacotes/detalhes', 'pacote' => $pacote->id], ['class' => 'btn']) ?></td>                        </tr>
                    <?php }?>
                <?php } ?>
        </table>

    </div>


</div>
