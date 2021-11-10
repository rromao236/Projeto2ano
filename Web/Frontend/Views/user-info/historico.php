<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historico';
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
table {
    border-collapse: collapse;
        width: 100%;
    }

    th, td {
    text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
    background-color: #005cbf;
        color: white;
    }
</style>

<div class="jumbotron text-center bg-transparent">
    <h1 class="display-4">Histórico</h1>
</div>
<div class="body-content container" style="text-align: center">
    <table>
        <tr>
            <th>Id Pacote</th>
            <th>Data compra</th>
            <th>Entidade</th>
            <th>Referência</th>
            <th>Valor</th>
            <th>Estado</th>
            <th></th>
        </tr>

        <tr>
            <td>3</td>
            <td>14/09/2021</td>
            <td></td>
            <td></td>
            <td>64.99 €</td>
            <td>Pago</td>
            <td><?= Html::a('Consultar Detalhes', [''], ['class'=>'button']) ?></td>

        </tr>

        <tr>
            <td>6</td>
            <td>18/10/2021</td>
            <td></td>
            <td></td>
            <td>54.99 €</td>
            <td>Pago</td>
            <td><?= Html::a('Consultar Detalhes', [''], ['class'=>'button']) ?></td>

        </tr>

        <tr>
            <td>9</td>
            <td>31/11/2021</td>
            <td>11236</td>
            <td>648358690</td>
            <td>29.99 €</td>
            <td>Por Pagar</td>
            <td><?= Html::a('Consultar Detalhes', [''], ['class'=>'button']) ?></td>

        </tr>
    </table>