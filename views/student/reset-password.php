<?php
//reset password view with single form field for username
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
                'id' => 'student-reset-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
]); ?>

<?= $form->field($model_student_reset, 'username')->textInput(['autofocus' => true]) ?>
<div class="form-group">
<div>
<?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
</div>
<?php ActiveForm::end(); ?>

</div>