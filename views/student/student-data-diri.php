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
    <?php
        $gen  = [ '0' => 'Pria', //gender map
                  '1' => 'Wanita',];
        echo $form->field($model_student_data_diri, 'jenis_kelamin_id')
            ->dropDownList($gen, ['prompt' => 'Pilih Jenis Kelamin']);
    ?>

    <?php echo $form->field($model_student_data_diri,'tanggal_lahir')->label('Tanggal Lahir'); ?>
    <!-- display the label for tempat_lahir on the left -->
    <?php echo $form->field($model_student_data_diri,'tempat_lahir')->label('Tempat Lahir'); ?>
    <!-- display the label for agama_id on the left -->
    <?php
        $relegion = [
            'Islam' => 'Islam',
            'Kristen' => 'Kristen',
            'Katolik' => 'Katolik',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
            'Konghucu' => 'Konghucu',
        ];
        echo $form->field($model_student_data_diri, 'agama_id')
            ->dropDownList($relegion, ['prompt' => 'Pilih Agama']);
    ?>
    <!-- display the label for alamat on the left -->
    <?php echo $form->field($model_student_data_diri,'alamat')->label('Alamat'); ?>
    <!-- display the label for kelurahan on the left -->
    <?php echo $form->field($model_student_data_diri,'kelurahan')->label('Kelurahan'); ?>
    <!-- display the label for provinsi on the left -->
    <!-- dropdown menu for all indonesian province -->
    <?php
    //map for all indonesia province, need more improvement like store in model
    $provinces = [
        'Aceh' => 'Aceh',
        'Bali' => 'Bali',
        'Bangka Belitung' => 'Bangka Belitung',
        'Banten' => 'Banten',
        'Bengkulu' => 'Bengkulu',
        'Gorontalo' => 'Gorontalo',
        'Jakarta' => 'Jakarta',
        'Jambi' => 'Jambi',
        'Jawa Barat' => 'Jawa Barat',
        'Jawa Tengah' => 'Jawa Tengah',
        'Jawa Timur' => 'Jawa Timur',
        'Kalimantan Barat' => 'Kalimantan Barat',
        'Kalimantan Selatan' => 'Kalimantan Selatan',
        'Kalimantan Tengah' => 'Kalimantan Tengah',
        'Kalimantan Timur' => 'Kalimantan Timur',
        'Kalimantan Utara' => 'Kalimantan Utara',
        'Kepulauan Riau' => 'Kepulauan Riau',
        'Lampung' => 'Lampung',
        'Maluku' => 'Maluku',
        'Maluku Utara' => 'Maluku Utara',
        'Nusa Tenggara Barat' => 'Nusa Tenggara Barat',
        'Nusa Tenggara Timur' => 'Nusa Tenggara Timur',
        'Papua' => 'Papua',
        'Papua Barat' => 'Papua Barat',
        'Riau' => 'Riau',
        'Sulawesi Barat' => 'Sulawesi Barat',
        'Sulawesi Selatan' => 'Sulawesi Selatan',
        'Sulawesi Tengah' => 'Sulawesi Tengah',
        'Sulawesi Tenggara' => 'Sulawesi Tenggara',
        'Sulawesi Utara' => 'Sulawesi Utara',
        'Sumatera Barat' => 'Sumatera Barat',
        'Sumatera Selatan' => 'Sumatera Selatan',
        'Sumatera Utara' => 'Sumatera Utara',
        'Yogyakarta' => 'Yogyakarta',
    ];
    echo $form->field($model_student_data_diri, 'provinsi')
        //fetch alll data in $provinces variable to dropdown menu
        ->dropDownList($provinces, ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown']);
        //->dropDownList(['0' => 'Pria', '1' => 'Wanita'])
    ?>
    <?php
        $cities = [ //need improvement like store in model
        'Aceh' => ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Sabang', 'Subulussalam'],
        'Bali' => ['Denpasar', 'Badung', 'Gianyar', 'Tabanan', 'Bangli'],
        'Bangka Belitung' => ['Pangkal Pinang', 'Tanjung Pandan', 'Muntok', 'Toboali', 'Koba'],
        // ... and so on for all provinces
    ];
    echo $form->field($model_student_data_diri, 'kabupaten')
        ->dropDownList($cities, ['prompt' => 'Pilih Kabupaten/ Kota']);
    ?>
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

