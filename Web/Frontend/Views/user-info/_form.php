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

    <?= $form->field($model, 'nif')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'birthdate')->textInput() ?>

    <!-- $form->field($model, 'points')->textInput() -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
