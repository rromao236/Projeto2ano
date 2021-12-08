<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserspackagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userspackages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_package') ?>

    <?= $form->field($model, 'purchasedate') ?>

    <?= $form->field($model, 'referencia') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'entity') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'usedpoints') ?>

    <?php // echo $form->field($model, 'nrpeople') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
