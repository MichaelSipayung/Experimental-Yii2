<?php
//this page is intended to be used as a view for student personal information (data diri)
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;

use yii\helpers\ArrayHelper; //for using array helper
$title  = 'Data Diri Mahasiswa';
?>
<h1><?= Html::encode($title) ?></h1>
<!-- display the form with left as label and right as field to filled -->
<?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
    <!-- display the label for nik on the left -->
    <?php echo $form->field($model_student_data_diri,'nik')->label('NIK'); ?>
    <!-- display the label for nisn on the left -->
    <?php echo $form->field($model_student_data_diri,'nisn')->label('NISN'); ?>
    <!-- display the label for no_kps on the left -->
    <?php echo $form->field($model_student_data_diri,'no_kps')->label('No KPS'); ?>
    <!-- display the label for nama on the left -->
    <?php echo $form->field($model_student_data_diri,'nama')->label('Nama'); ?>
    <!-- display the label for jenis_kelamin_id on the left -->
    <?= $form->field($model_student_data_diri, 'jenis_kelamin_id')->dropDownList(['0' => 'Pria', '1' => 'Wanita']) ?>
    <!-- display the label for tanggal_lahir on the left -->

    <?php echo $form->field($model_student_data_diri,'tanggal_lahir')->label('Tanggal Lahir'); ?>
    <!-- display the label for tempat_lahir on the left -->
    <?php echo $form->field($model_student_data_diri,'tempat_lahir')->label('Tempat Lahir'); ?>
    <!-- display the label for agama_id on the left -->
    <?php echo $form->field($model_student_data_diri,'agama_id')->label('Agama'); ?>
    <!-- display the label for alamat on the left -->
    <?php echo $form->field($model_student_data_diri,'alamat')->label('Alamat'); ?>
    <!-- display the label for kelurahan on the left -->
    <?php echo $form->field($model_student_data_diri,'kelurahan')->label('Kelurahan'); ?>
    <!-- display the label for provinsi on the left -->
    <?php echo $form->field($model_student_data_diri,'provinsi')->label('Provinsi'); ?>
    <!-- display the label for kabupaten on the left -->
    <?php echo $form->field($model_student_data_diri,'kabupaten')->label('Kabupaten'); ?>
    <!-- display the label for alamat_kec on the left -->
    <?php echo $form->field($model_student_data_diri,'alamat_kec')->label('Alamat Kecamatan'); ?>
    <!-- display the label for kode_pos on the left -->
    <?php echo $form->field($model_student_data_diri,'kode_pos')->label('Kode Pos'); ?>
    <!-- display the label for no_telepon_rumah on the left -->
    <?php echo $form->field($model_student_data_diri,'no_telepon_rumah')->label('No Telepon Rumah'); ?>
    <!-- display the label for no_telepon_mobile on the left -->
    <?php echo $form->field($model_student_data_diri,'no_telepon_mobile')->label('No Telepon Mobile'); ?>
    <!-- display the label for email on the left -->
    <?php echo $form->field($model_student_data_diri,'email')->label('Email'); ?>
    <!-- display the submit button -->
    <div class="form-group">
        <div>
            <?php  Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
            <?php  Html::submitButton('Daftarkan', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

