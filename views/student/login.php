<?php
//this page is experimental version of student login page
//this page is not used in the final version of the project
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
$this->title ='Student Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site login">
    <h1> <?=Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to login:</p>
    <div class="row">
        <div class="col-lg-5">
            <!-- create login field -->
            <?php $form = ActiveForm::begin([
                'id' => 'student-login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}", //template is a property of the fieldConfig class
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'], //labelOptions is a property of the fieldConfig class
                    'inputOptions' => ['class' => 'col-lg-3 form-control'], //inputOptions is a property of the fieldConfig class
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'], //errorOptions is a property of the fieldConfig class
                ],
            ]);
            ?>
            <?=$form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?=$form->field($model, 'password')->passwordInput() ?>
            <?=$form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>", //template is a property of the checkbox class
            ]) ?>
            <div class="form-group">
                <div>
                    <?=Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
    </div>
</div>
