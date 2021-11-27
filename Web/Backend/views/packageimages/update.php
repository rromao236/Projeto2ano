<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Packageimages */

$this->title = 'Update Packageimages: ' . $model->id_image;
$this->params['breadcrumbs'][] = ['label' => 'Packageimages', 'url' => ['index', 'id' => $model->package_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id_image, 'url' => ['view', 'id_image' => $model->id_image]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packageimages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
