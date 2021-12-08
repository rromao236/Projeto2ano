<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usersinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usersinfo-form container" >

    <?php $form = ActiveForm::begin(); ?>

    <!-- $form->field($model, 'userid')->textInput() -->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nome') ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true])->label('Morada') ?>

    <?= $form->field($model, 'nif')->textInput()->label('NIF') ?>

    <?= $form->field($model, 'phone')->textInput()->label('Telemóvel') ?>

    <?= $form->field($model, 'birthdate')->textInput()->label('Data de Nascimento') ?>

    <!-- $form->field($model, 'points')->textInput() -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
