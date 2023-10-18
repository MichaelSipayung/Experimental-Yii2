<?php
//model to store parent data (orant tua), the  current source is getting from the student data diri
//model, may be changed later if needed, the controller is StudentController.php and the view is
//student-data-orang-tua.php, action is student-data-orang-tua, it's also possible to change later
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentDataOrangTuaForm extends Model{
    //current available data members, may be added later
    public $nama_ayah;public $nama_ibu;public $nik_ayah;
    public $nik_ibu;public $tgl_lahir_ayah;public $tgl_lahir_ibu;
    public $pendidikan_ayah;public $pendidikan_ibu;public $alamat_ortu;
    public $keluruhan;public $provinsi;public $kabupaten;
    public $kecamatan;public $kode_pos;public $no_hp_ortu;
    public $pekerjaan_ayah;public $pekerjaan_ibu;public $penghasilan_ayah;
    public $penghasilan_ibu;
    //rules to validate the data using the above data members
    public function rules() {
       //rules for all data members, need more improvement
        //more test needed to ensure the data is valid
         return [
              [['nama_ayah','nama_ibu','tgl_lahir_ayah','tgl_lahir_ibu'
                  ,'alamat_ortu','keluruhan','provinsi','kabupaten','kecamatan','no_hp_ortu',], 'required'],

             ['nik_ayah','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],
             ['nik_ibu','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],

             ['tgl_lahir_ayah','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],
             ['tgl_lahir_ibu','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],

             ['no_hp_ortu','match','pattern'=>'/^[0-9]*$/','message'=>'No Telepon tidak boleh mengandung huruf'],
             ['no_hp_ortu','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],

             ['kode_pos','match','pattern'=>'/^[0-9]*$/','message'=>'Kode Pos tidak boleh mengandung huruf'],
             ['kode_pos','string','min'=>5,'max'=>5,'message'=>'Kode Pos harus 5 digit'],

             ['nama_ayah','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
             ['nama_ibu','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],

             ['pekerjaan_ayah','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Pekerjaan tidak boleh mengandung angka'],
             ['pekerjaan_ibu','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Pekerjaan tidak boleh mengandung angka'],
             //rules for salary
             ['penghasilan_ayah','match','pattern'=>'/^[0-9]*$/','message'=>'Penghasilan tidak boleh mengandung huruf'],
             ['penghasilan_ibu','match','pattern'=>'/^[0-9]*$/','message'=>'Penghasilan tidak boleh mengandung huruf'],

             ['penghasilan_ayah','string','min'=>6,'max'=>9,'message'=>'Penghasilan harus 6-9 digit'],
             ['penghasilan_ibu','string','min'=>6,'max'=>9,'message'=>'Penghasilan harus 6-9 digit'],
         ];
    }
    //insert all data members into database, consider for more exception handling
    //to ensure the data is inserted successfully
    public function insertDataOrangTua() {
        if($this->validate()){
            $data_insert  = new StudentDataDiri();
            $data_insert->nama_ayah_kandung = $this->nama_ayah;
            $data_insert->nama_ibu_kandung = $this->nama_ibu;
            $data_insert->nik_ayah = $this->nik_ayah;
            $data_insert->nik_ibu = $this->nik_ibu;

            $data_insert->tanggal_lahir_ayah = $this->tgl_lahir_ayah;
            $data_insert->tanggal_lahir_ibu = $this->tgl_lahir_ibu;

            $data_insert->pendidikan_ayah_id = $this->pendidikan_ayah;
            $data_insert->pendidikan_ibu_id = $this->pendidikan_ibu;

            $data_insert->alamat_orang_ortu = $this->alamat_ortu;
            //to do: add the field to table t_pendaftar
            /*$data_insert->keluruhan = $this->keluruhan;
            $data_insert->provinsi = $this->provinsi;
            $data_insert->kabupaten = $this->kabupaten;
            $data_insert->kecamatan = $this->kecamatan;*/

            $data_insert->kode_pos_orang_tua = $this->kode_pos;
            $data_insert->no_hp_ortu = $this->no_hp_ortu;

            $data_insert->pekerjaan_ayah_id = $this->pekerjaan_ayah;
            $data_insert->pekerjaan_ibu_id = $this->pekerjaan_ibu;

            $data_insert->penghasilan_ayah = $this->penghasilan_ayah;
            $data_insert->penghasilan_ibu = $this->penghasilan_ibu;

            if($data_insert->save())
                return true;
            else{
                $this->addError("Error", "Data Orang Tua Gagal Disimpan");
            }
        }
        return false;
    }
}
?>
