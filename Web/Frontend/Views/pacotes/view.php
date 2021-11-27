<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userspackages */

$session = Yii::$app->session;
$session->destroy();

$this->title = $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'Userspackages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userspackages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Confirmar', ['pontos', 'pontos' => $model->usedpoints], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['cancelar', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja cancelar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'id_package',
            'purchasedate',
            'referencia',
            'price',
            'entity',
            'estado',
            'usedpoints',
            'nrpeople',
        ],
    ]) ?>

</div>
