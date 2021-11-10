<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PackagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'flightstart') ?>

    <?php // echo $form->field($model, 'flightend') ?>

    <?php // echo $form->field($model, 'flightbackstart') ?>

    <?php // echo $form->field($model, 'flightbackend') ?>

    <?php // echo $form->field($model, 'id_hotel') ?>

    <?php // echo $form->field($model, 'id_airportstart') ?>

    <?php // echo $form->field($model, 'id_airportend') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
