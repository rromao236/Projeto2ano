<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userspackages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userspackages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usedpoints')->textInput(['value' => $model->isNewRecord ? '0' : $model->some_field])->label('Pontos a Usar') ?>

    <?= $form->field($model, 'nrpeople')->textInput()->label('Nº de Pessoas')?>

    <div class="form-group">
        <?= Html::submitButton('Confirmar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
