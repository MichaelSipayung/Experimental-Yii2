<?php
use yii\helpers\Html;
use yii\bootstrap5\activeForm;
?>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
<?php echo $form->field($model_student_data_o_tua,'nama_ayah_kandung')->label('Nama Ayah Kandung'); ?>
<?php echo $form->field($model_student_data_orang_tua,'nama_ibu_kandung')->label('Nama Ibu Kandung'); ?>
<?php echo $form->field($model_student_data_orang_tua,'nik_ayah')->label('NIK Ayah'); ?>
<?php echo $form->field($model_student_data_orang_tua,'nik_ibu')->label('NIK Ibu'); ?>
<?php
echo $form->field($model_student_data_orang_tua, 'tgl_lahir_ayah')->widget(\yii\jui\DatePicker::class, [
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
echo $form->field($model_student_data_orang_tua, 'tgl_lahir_ibu')->widget(\yii\jui\DatePicker::class, [
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
    echo $form->field($model_student_data_orang_tua, 'pendidikan_ayah')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$education, ['prompt' => 'Pilih Pendidikan Terakhir Ayah']);
?>
<?php
    echo $form->field($model_student_data_orang_tua, 'pendidikan_ibu')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$education, ['prompt' => 'Pilih Pendidikan  Terakhir Ibu']);
    ?>
<?php echo $form->field($model_student_data_orang_tua,'alamat_ortu')->label('Alamat Orang Tua'); ?>
<?php //echo $form->field($model_student_data_orang_tua,'kelurahan')->label('Kelurahan'); ?>
<?php
    echo $form->field($model_student_data_orang_tua, 'provinsi')
        ->dropDownList(\app\models\StudentDataDiriForm::$provinces, ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown']);
    ?>
<?php
    echo $form->field($model_student_data_orang_tua, 'kabupaten')
        ->dropDownList(\app\models\StudentDataDiriForm::$cities, ['prompt' => 'Pilih Kabupaten/ Kota']);
    ?>
<?php echo $form->field($model_student_data_orang_tua,'kecamatan')->label('Kecamatan'); ?>
<?php echo $form->field($model_student_data_orang_tua,'kode_pos')->label('Kode Pos'); ?>
<?php echo $form->field($model_student_data_orang_tua,'no_hp_ortu')->label('No HP Orang Tua')
    ->textInput(['placeholder' => 'Contoh: 081234567890']); ?>
<?php
    echo $form->field($model_student_data_orang_tua, 'pekerjaan_ayah')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$job, ['prompt' => 'Pilih Pekerjaan Ayah']);
    ?>
<?php
    echo $form->field($model_student_data_orang_tua, 'pekerjaan_ibu')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$job, ['prompt' => 'Pilih Pekerjaan Ibu']);
    ?>
<?php
    echo $form->field($model_student_data_orang_tua, 'penghasilan_ayah')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$salary, ['prompt' => 'Pilih Penghasilan Ayah']);
    ?>
<?php
    echo $form->field($model_student_data_orang_tua, 'penghasilan_ibu')
        ->dropDownList(\app\models\StudentDataOrangTuaForm::$salary, ['prompt' => 'Pilih Penghasilan Ibu']); ?>
<!-- end of form -->
<div class="form-group">
    <div>
        <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
        <?=  Html::submitButton('Daftarkan', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>    