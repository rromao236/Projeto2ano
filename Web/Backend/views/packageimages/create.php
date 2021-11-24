<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Packageimages */

$this->title = 'Create Packageimages';
$this->params['breadcrumbs'][] = ['label' => 'Packageimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packageimages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
