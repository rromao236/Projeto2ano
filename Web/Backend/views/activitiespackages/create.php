<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activitiespackages */

$this->title = 'Create Activitiespackages';
$this->params['breadcrumbs'][] = ['label' => 'Activitiespackages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activitiespackages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
