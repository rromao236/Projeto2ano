<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activitiespackages */

$this->title = 'Update Activitiespackages: ' . $model->id_activity;
$this->params['breadcrumbs'][] = ['label' => 'Activitiespackages', 'url' => ['index', 'id' => $model->id_package]];
$this->params['breadcrumbs'][] = ['label' => $model->id_activity, 'url' => ['view', 'id_activity' => $model->id_activity, 'id_package' => $model->id_package]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activitiespackages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
