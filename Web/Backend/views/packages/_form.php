<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Hotels;
use app\models\Airports;

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

    <h4>Hotel</h4>

    <?= Html::activeDropDownList($model, 'id_hotel',
        ArrayHelper::map(Hotels::find()->all(), 'id', 'name')) ?>

    <h4><br>Start Aeroport:</h4>

    <?= Html::activeDropDownList($model, 'id_airportstart',
        ArrayHelper::map(Airports::find()->all(), 'id', 'name')) ?>

    <h4><br>Comeback Aeroport:</h4>

    <?= Html::activeDropDownList($model, 'id_airportend',
        ArrayHelper::map(Airports::find()->all(), 'id', 'name')) ?>

    <div class="form-group"><br>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
