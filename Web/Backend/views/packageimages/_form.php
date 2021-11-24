<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Packageimages */
/* @var $form yii\widgets\ActiveForm */
?>

<!--[
'options' => ['enctype' => 'multipart/form-data']
]-->

<div class="packageimages-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ])?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'package_id')->textInput(['readonly' => true, 'value' => $model->isNewRecord ? $id : $model->package_id]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
