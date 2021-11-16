<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usersinfo */

$this->title = 'Create Usersinfo';
$this->params['breadcrumbs'][] = ['label' => 'Usersinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usersinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
