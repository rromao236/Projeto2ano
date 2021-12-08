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


    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            [
                'label'=>'Data de Compra',
                'value'=>$model->purchasedate,
            ],
            [
                'label'=>'Pontos Usados',
                'value'=>$model->usedpoints,
            ],
            [
                'label'=>'Nº de Pessoas',
                'value'=>$model->nrpeople,
            ],
            [
                'label'=>'Referência',
                'value'=>$model->referencia,
            ],
            [
                'label'=>'Entidade',
                'value'=>$model->entity,
            ],
            [
                    'label'=>'Preço',
                    'value'=>$model->price,
            ],
        ],
    ]) ?>
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

</div>
