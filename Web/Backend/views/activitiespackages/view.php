<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activitiespackages */

$this->title = $model->id_activity;
$this->params['breadcrumbs'][] = ['label' => 'Activitiespackages', 'url' => ['index', 'id' => $model->id_package]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="activitiespackages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_activity' => $model->id_activity, 'id_package' => $model->id_package], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_activity' => $model->id_activity, 'id_package' => $model->id_package], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_activity',
            'id_package',
            'responsible',
            'timestart',
            'duration',
        ],
    ]) ?>

</div>
