<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usersinfo */

$this->title = '' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Usersinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['index', 'userid' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usersinfo-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
