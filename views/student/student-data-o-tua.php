<?php
use yii\helpers\Html;
use yii\bootstrap5\activeForm;
$title = 'Data Orang Tua';
?>
<h1><?= Html::encode($title) ?></h1>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
<?php echo $form->field($model_student_data_o,'nama_ayah_kandung')->label('Nama Ayah Kandung'); ?>
<?php echo $form->field($model_student_data_o,'nama_ibu_kandung')->label('Nama Ibu Kandung'); ?>
<?php echo $form->field($model_student_data_o,'nik_ayah')->label('NIK Ayah'); ?>
<?php echo $form->field($model_student_data_o,'nik_ibu')->label('NIK Ibu'); ?>
<?php
echo $form->field($model_student_data_o, 'tanggal_lahir_ayah')->widget(\yii\jui\DatePicker::class, [
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],
])->textInput(['placeholder'=>'Contoh: 2002-01-31'])
    ->label('Tanggal Lahir Ayah');
?>
<?php
echo $form->field($model_student_data_o, 'tanggal_lahir_ibu')->widget(\yii\jui\DatePicker::class, [
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],
    ])->textInput(['placeholder'=>'Contoh: 2002-01-31'])
    ->label('Tanggal Lahir Ibu');
?>
<?php
    echo $form->field($model_student_data_o, 'pendidikan_ayah')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$education, ['prompt' => 'Pilih Pendidikan Terakhir Ayah']);
?>
<?php
    echo $form->field($model_student_data_o, 'pendidikan_ibu')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$education, ['prompt' => 'Pilih Pendidikan  Terakhir Ibu']);
    ?>
<?php echo $form->field($model_student_data_o,'alamat_orang_tua')->label('Alamat Orang Tua'); ?>
<?php echo $form->field($model_student_data_o,'kelurahan')->label('Keluruhan'); ?>
<?php
//map for all indonesia province, need more improvement like store in model
echo $form->field($model_student_data_o, 'provinsi')
    //fetch alll data in $provinces variable to dropdown menu
    ->dropDownList(\app\models\StudentDataDiriForm::$provinces, ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown']);
//->dropDownList(['0' => 'Pria', '1' => 'Wanita'])
?>
<?php
echo $form->field($model_student_data_o, 'kabupaten')
    ->dropDownList(\app\models\StudentDataDiriForm::$cities, ['prompt' => 'Pilih Kabupaten/ Kota']);
?>
<?php
echo $form->field($model_student_data_o, 'kecamatan')
    ->dropDownList(\app\models\StudentDataDiriForm::$cities, ['prompt' => 'Pilih Kecamatan']);
?>
<?php //echo $form->field($model_student_data_orang_tua,'kelurahan')->label('Kelurahan'); ?>
<?php
    /*echo $form->field($model_student_data_o, 'provinsi')
        ->dropDownList(\app\models\StudentDataDiriForm::$provinces, ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown']);*/
    ?>
<?php
   /* echo $form->field($model_student_data_o, 'kabupaten')
        ->dropDownList(\app\models\StudentDataDiriForm::$cities, ['prompt' => 'Pilih Kabupaten/ Kota']);*/
    ?>
<?php //echo $form->field($model_student_data_o,'kecamatan')->label('Kecamatan'); ?>

<?php echo $form->field($model_student_data_o,'kode_pos_orang_tua')->label('Kode Pos'); ?>
<?php echo $form->field($model_student_data_o,'no_hp_orangtua')->label('No HP Orang Tua')
    ->textInput(['placeholder' => 'Contoh: 081234567890']); ?>
<?php
    echo $form->field($model_student_data_o, 'pekerjaan_ayah')
        ->dropDownList(\app\models\StudentDataOForm::$job, ['prompt' => 'Pilih Pekerjaan Ayah']);
    ?>
<?php
    echo $form->field($model_student_data_o, 'pekerjaan_ibu')
        ->dropDownList(\app\models\StudentDataOForm::$job, ['prompt' => 'Pilih Pekerjaan Ibu']);
    ?>
<?php
    echo $form->field($model_student_data_o, 'penghasilan_ayah')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$salary, ['prompt' => 'Pilih Penghasilan Ayah']);
    ?>
<?php
    echo $form->field($model_student_data_o, 'penghasilan_ibu')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$salary, ['prompt' => 'Pilih Penghasilan Ibu']); ?>
<!-- end of form -->
<div class="form-group">
    <div>
        <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
        <?=  Html::submitButton('Daftarkan', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>    