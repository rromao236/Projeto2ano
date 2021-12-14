<?php

use app\models\Packages;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Histórico';
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['usersinfo/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <br>
    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <style>

        #table-div{
            /*overflow: scroll;*/
        }
        #table-div table{
            /*float: left;*/
        }

        html>body #table-div {
            /*overflow: hidden;
            width: 100%;*/
        }

        #historico {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;

            /*position: relative;*/
        }
        #historico td, #historico th {
            border: 1px solid #ddd;
            padding: 8px;

        }
        #historico #topo{
            text-transform: uppercase;

        }
        #historico th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #2667e0;
            color: white;
            font-size: 85%;

            /*position: sticky;
            top: 0;*/
        }

        #historico tr:nth-child(even){background-color: #f2f2f2;}
        #historico tr:hover {background-color: #ddd;}

        .btn:hover{
            color: #0000ff;
            /*color: #005eff;*/
        }

    </style>

    <br>
    <div class="body-content container" id="table-div">
        <table id="historico">
            <tr align="center" id="topo">
                <th>Pacote</th>
                <th>Data de Compra</th>
                <th>Estado</th>
                <th>Entidade</th>
                <th>Referência</th>
                <th>Valor</th>
            </tr>

            <?php foreach ($pacotesC AS $pacoteC){
                $pacote = Packages::find()
                    ->where(['id' => $pacoteC->id_package])
                    ->one();

                $refer = (string)$pacoteC->referencia;
                $referFormat = substr($refer, 0, 3) .' '. substr($refer, 3, 3) .' '. substr($refer, 6);

                $dateFormat = DateTime::createFromFormat('Y-m-d H:i:s', $pacoteC->purchasedate)->format('d-m-Y, H:i');

                ?>
                    <tr>
                        <td align="center" id="pacNome"><?= Html::a($pacote->title, ['pacotes/detalhes', 'pacote' => $pacote->id], ['class' => 'btn'])?></td>
                        <td align="center"><?= $dateFormat ?></td>
                        <td align="center"><?= $pacoteC->estado ?></td>
                        <td align="center"><?= $pacoteC->entity ?></td>
                        <td align="center"><?= $referFormat ?></td>
                        <td align="center"><?= $pacoteC->price . "€"?></td>
                    </tr>
            <?php } ?>
        </table><br><br>
    </div>


</div>
