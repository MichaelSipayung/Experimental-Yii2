<?php
//this page is intended to be used as a view for student personal information (data diri)
// Path: views/student/student-data-diri.php
// current status is experimental, need more improvement with the design
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
    <?php echo $form->field($model_student_data_diri,'nik')
        ->label('NIK')
        //->textInput(['maxlength' => 16])
        ->input('number');
    ?>
    <!-- display the label for nisn on the left -->
    <?php echo $form->field($model_student_data_diri,'nisn')->label('NISN')
        ->input('number'); ?>
    <!-- display the label for no_kps on the left -->
    <?php echo $form->field($model_student_data_diri,'no_kps')->label('No KPS')
        ->input('number'); ?>
    <!-- display the label for nama on the left -->
    <?php echo $form->field($model_student_data_diri,'nama')->label('Nama'); ?>
    <!-- display the label for jenis_kelamin_id on the left -->
    <?php
        echo $form->field($model_student_data_diri, 'jenis_kelamin')
            ->dropDownList(\app\models\StudentDataDiriForm::$gen, ['prompt' => 'Pilih Jenis Kelamin']);
    ?>
    <?php
    echo $form->field($model_student_data_diri, 'tanggal_lahir')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'Contoh: 2002-01-31'])
        ->label('Tanggal Lahir');
    ?>
    <!-- display the label for tempat_lahir on the left -->
    <?php echo $form->field($model_student_data_diri,'tempat_lahir')->label('Tempat Lahir'); ?>
    <!-- display the label for agama_id on the left -->
    <?php
        echo $form->field($model_student_data_diri, 'agama_id')
            ->dropDownList(\app\models\StudentDataDiriForm::$relegion, ['prompt' => 'Pilih Agama']);
    ?>
    <!-- display the label for alamat on the left -->
    <?php echo $form->field($model_student_data_diri,'alamat')->label('Alamat'); ?>
    <!-- display the label for kelurahan on the left -->
    <?php echo $form->field($model_student_data_diri,'kelurahan')->label('Kelurahan'); ?>
    <!-- display the label for provinsi on the left -->
    <!-- dropdown menu for all indonesian province -->
    <?php
    //map for all indonesia province, need more improvement like store in model
    echo $form->field($model_student_data_diri, 'provinsi')
        //fetch alll data in $provinces variable to dropdown menu
        ->dropDownList(\app\models\StudentDataDiriForm::$provinces, ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown']);
        //->dropDownList(['0' => 'Pria', '1' => 'Wanita'])
    ?>
    <?php
        echo $form->field($model_student_data_diri, 'kabupaten')
            ->dropDownList(\app\models\StudentDataDiriForm::$cities, ['prompt' => 'Pilih Kabupaten/ Kota']);
    ?>
    <!-- display the label for alamat_kec on the left -->
    <?php echo $form->field($model_student_data_diri,'alamat_kec')->label('Alamat Kecamatan'); ?>
    <!-- display the label for kode_pos on the left -->
    <?php echo $form->field($model_student_data_diri,'kode_pos')->label('Kode Pos')->input('number'); ?>
    <!-- display the label for no_telepon_rumah on the left -->
    <?php echo $form->field($model_student_data_diri,'no_telepon_rumah')
        ->label('No Telepon Rumah')
        ->textInput(['placeholder'=>'Contoh: +62 21 80643104']); ?>
    <!-- display the label for no_telepon_mobile on the left -->
    <?php echo $form->field($model_student_data_diri,'no_telepon_mobile')
        ->label('No Telepon/ Whatsapp')
        //make placeholder for phone number
        ->textInput(['placeholder' => 'Contoh: 081234567890']); ?>
    <!-- display the label for email on the left -->
    <?php echo $form->field($model_student_data_diri,'email')->label('Email'); ?>
    <!-- display the submit button -->
    <div class="form-group">
        <div>
            <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
            <?=  Html::submitButton('Daftarkan', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

