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
        <label>Nif: <?php echo $utilizador->nif; ?></label>
    </div>

    <div class="top-margin">
        <label>Nome: <?php echo $utilizador->name; ?></label>
    </div>

    <div class="top-margin">
        <label>Morada: <?php echo $utilizador->adress; ?></label>
    </div>

    <div class="top-margin">
        <label>Telemovel: <?php echo $utilizador->phone; ?></label>
    </div>

    <div class="top-margin">
        <label>Data de nascimento: <?php echo $utilizador->birthdate; ?></label>
    </div>

    <div class="top-margin">
        <label>Pontos: <?php echo $utilizador->points; ?></label>
    </div>

    <div class="top-margin">
        <br>
        <?= Html::a('Editar Perfil', ['update', 'userid'=>$utilizador->userid], ['class'=>'btn btn-info']) ?>

        <?= Html::a('Historico', ['historico'], ['class'=>'btn btn-info']) ?>

        <?= Html::a('Mudar password', [''], ['class'=>'btn btn-info']) ?>
    </div>

</form>


