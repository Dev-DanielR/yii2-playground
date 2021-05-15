<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */

$activeStates = array(1 => "Yes", 0 => "No");
?>
<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'user_id') ?>
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'content') ?>
    <?= $form->field($model, 'active')->dropDownList($activeStates, ['prompt' => 'Select...']) ?>
    <?= $form->field($model, 'publish_date')->widget(DatePicker::className(), [
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
