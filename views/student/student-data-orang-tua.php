<?php
//this page is intended to be used as a view for parent information (data orang tua)
//the implementation is still experimental, need more improvement with the design
// Path: views/student/student-data-orang-tua.php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\bootstrap5\activeForm;

$title  = 'Data Orang Tua Mahasiswa';
?>
<h1><?= Html::encode($title) ?></h1>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
<?php echo $form->field($model_student_data_orang_tua,'nama_ayah_kandung')->label('Nama Ayah Kandung'); ?>
<?php
/* class someThing extends Model{
    public static function saveData(){
        $command  = Yii::$app->db->createCommand();
//set the table name and insert data to specific pendaftar_id
//$command->sql('INSERT INTO t_pendaftar (nama_ayah_kandung) VALUES (:nama_ayah) WHERE pendaftar_id = 13557');
        $command->setSql( "UPDATE t_pendaftar SET nama_ayah_kandung=\"Donals\" where  pendaftar_id = 13557");
//$command->bindValues(['nama_ayah' => $this->nama_ayah]);
//execute the query
        $command->execute();
    }

} */
?>

<!-- end of the form -->
<div class="form-group">
    <div>
        <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
        <?=  Html::submitButton('Daftarkan', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
