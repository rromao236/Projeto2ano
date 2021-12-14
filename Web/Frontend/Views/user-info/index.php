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
        <label><b>Nome: </b><?php echo $utilizador->name; ?></label>
    </div>

    <div class="top-margin">
        <label><b>Morada: </b><?php echo $utilizador->adress; ?></label>
    </div>

    <div class="top-margin">
        <label><b>NIF: </b><?php echo $utilizador->nif; ?></label>
    </div>

    <div class="top-margin">
        <label><b>Telemóvel: </b><?php echo $utilizador->phone; ?></label>
    </div>

    <div class="top-margin">
        <label><b>Data de Nascimento: </b><?php echo DateTime::createFromFormat('Y-m-d', $utilizador->birthdate)->format('F d, Y'); ?></label>
    </div>

    <div class="top-margin">
        <label><b>Pontos: </b><?php echo $utilizador->points; ?></label>
    </div>

    <div class="top-margin">
        <br>
        <?= Html::a('Editar Perfil', ['update', 'userid'=>$utilizador->userid], ['class'=>'btn btn-info']) ?>

        <?= Html::a('Histórico Compras', ['userspackages/index'], ['class'=>'btn btn-info']) ?>
    </div>

</form>
