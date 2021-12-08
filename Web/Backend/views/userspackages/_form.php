<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userspackages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userspackages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'id_package')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'purchasedate')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'referencia')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'entity')->textInput(['readonly' => true]) ?>

<!--    $form->field($model, 'estado')->textInput(['maxlength' => true])-->

    <p><b>Estado</b></p>

    <?= Html::activeDropDownList($model, 'estado', array('Por pagar'=>'Por pagar', 'Pago'=>'Pago')) ?>
    <br><br>
<!--    $form->field($model, 'usedpoints')->textInput() -->
<!---->
<!--    $form->field($model, 'nrpeople')->textInput()-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
