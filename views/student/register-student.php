<?php
//student registration view
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Registrasi Akun Calon Mahasiswa Baru';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model_student_register,'nik')->textInput(['maxlength'=>true]) ?>
<?= $form->field($model_student_register,'username')->textInput(['maxlength'=>true]) ?>
<?= $form->field($model_student_register,'email')->textInput(['maxlength'=>true]) ?>
<?= $form->field($model_student_register,'password')->passwordInput(['maxlength'=>true]) ?>
<?= $form->field($model_student_register,'password_repeat')->passwordInput(['maxlength'=>true]) ?>
<?= $form->field($model_student_register,'phone_number')->textInput(['maxlength'=>true]) ?>
<div class="form-group">
    <?= Html::submitButton('Register',['class'=>'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

