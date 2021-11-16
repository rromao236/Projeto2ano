<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitiespackagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activitiespackages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_activity') ?>

    <?= $form->field($model, 'id_package') ?>

    <?= $form->field($model, 'responsible') ?>

    <?= $form->field($model, 'timestart') ?>

    <?= $form->field($model, 'duration') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
