<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MailHospital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mail-hospital-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rergion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospital')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
