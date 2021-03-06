<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Arrayhelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $users app\models\User[] */
/* @var $form yii\widgets\ActiveForm */

$activeStates = array(1 => "Yes", 0 => "No");
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users,"id","username"), ['prompt' => 'Select...']) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'active')->dropDownList($activeStates, ['prompt' => 'Select...']) ?>
    <?= $form->field($model, 'publish_date')->widget(DatePicker::className(), [
        'inline' => false,
        'template' => '{addon}{input}',
        'clientOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
