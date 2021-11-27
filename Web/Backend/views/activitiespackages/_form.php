<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Activities;

/* @var $this yii\web\View */
/* @var $model app\models\Activitiespackages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activitiespackages-form">

    <?php $form = ActiveForm::begin(); ?>

    <h4><br>Actividade:</h4>

    <?= Html::activeDropDownList($model, 'id_activity',
        ArrayHelper::map(Activities::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'id_package')->textInput(['readonly' => true, 'value' => $model->isNewRecord ? $id : $model->id_package]) ?>

    <?= $form->field($model, 'responsible')->textInput(['maxlength' => true]) ?>

    <!--$form->field($model, 'timestart')->textInput()-->
    <?php echo $form->field($model, 'timestart')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
