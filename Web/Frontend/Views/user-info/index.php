<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>

<form class="container">
    <h2>Perfil:</h2><br>

    <div class="top-margin">
        <label>Nif: 1234567890</label>
        <!--<input type="text" value="1234567890" name="nif" class="form-control">-->
    </div>

    <div class="top-margin">
        <label>Nome: Andre</label>
        <!--<input type="text" value="Andre" name="name" class="form-control">-->
    </div>

    <div class="top-margin">
        <label>Morada: Rua das Flores N4</label>
        <!--<input type="text" value="Rua das Flores N4" name="adress" class="form-control">-->
    </div>

    <div class="top-margin">
        <label>Telemovel: 914573567</label>
        <!--<input type="text" value="914573567" name="phone" class="form-control">-->
    </div>

    <div class="top-margin">
        <label>Email: andre@gmail.com</label>
        <!--<input type="text" value="andre@gmail.com" name="email" class="form-control">-->
    </div>

    <div class="top-margin">
        <label>Data de nascimento: 12/06/2001</label>
        <!--<input type="text" value="12/06/2001" name="birtdate" class="form-control">-->
    </div>

    <div class="top-margin">
        <label>Pontos: 50</label>
        <!--<input type="text" value="50" name="points" class="form-control">-->
    </div>

    <div class="top-margin">
        <br>
        <?= Html::a('Editar Perfil', ['editar'], ['class'=>'btn btn-info']) ?>

        <?= Html::a('Historico', ['historico'], ['class'=>'btn btn-info']) ?>

        <?= Html::a('Mudar password', [''], ['class'=>'btn btn-info']) ?>
    </div>

</form>


