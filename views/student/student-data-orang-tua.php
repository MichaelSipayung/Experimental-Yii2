<?php
//this page is intended to be used as a view for parent information (data orang tua)
//the implementation is still experimental, need more improvement with the design
// Path: views/student/student-data-orang-tua.php
use yii\helpers\Html;
use yii\bootstrap5\activeForm;
$title  = 'Data Orang Tua Mahasiswa';
?>
<h1><?= Html::encode($title) ?></h1>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
<?php echo $form->field($model_student_data_orang_tua,'nama_ayah_kandung')->label('Nama Ayah Kandung'); ?> 
<!-- end of the form -->
<div class="form-group">
    <div>
        <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
        <?=  Html::submitButton('Daftarkan', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
