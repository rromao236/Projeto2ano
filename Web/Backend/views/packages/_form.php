<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Packages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'flightstart')->textInput() ?>

    <?= $form->field($model, 'flightend')->textInput() ?>

    <?= $form->field($model, 'flightbackstart')->textInput() ?>

    <?= $form->field($model, 'flightbackend')->textInput() ?>

    <?= $form->field($model, 'id_hotel')->textInput() ?>

    <?= $form->field($model, 'id_airportstart')->textInput() ?>

    <?= $form->field($model, 'id_airportend')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
