<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */

$genders = array("M" => "Male", "F" => "Female");
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password') ?>
    <?= $form->field($model, 'gender')->dropDownList($genders, ['prompt' => 'Select...']) ?>
    <?= $form->field($model, 'birthday')->widget(DatePicker::className(), [
        'inline' => true, 
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']
    ]) ?>
    <?= $form->field($model, 'join_date')->widget(DatePicker::className(), [
        'inline' => true, 
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
