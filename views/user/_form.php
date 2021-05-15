<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$genders = array("M" => "Male", "F" => "Female");
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropDownList($genders, ['prompt' => 'Select...']) ?>
    <?= $form->field($model, 'birthday')->widget(DatePicker::className(), [
        'inline' => false,
        'template' => '{addon}{input}',
        'clientOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']
    ]) ?>
    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'join_date')->widget(DatePicker::className(), [
        'inline' => false,
        'template' => '{addon}{input}',
        'clientOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
