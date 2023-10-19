<?php
// Path: models/StudentDataOForm.php
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentDataOForm extends Model{
 //current available data members, may be added later
 public $nama_ayah_kandung;public $nama_ibu_kandung;public $nik_ayah;
 public $nik_ibu;public $tanggal_lahir_ayah;public $tanggal_lahir_ibu;
 public $pendidikan_ayah_id;public $pendidikan_ibu_id;public $alamat_orang_tua;
 public $keluruhan;public $provinsi;public $kabupaten;
 public $kecamatan;public $kode_pos_orang_tua;public $no_hp_orangtua;
 public $pekerjaan_ayah;public $pekerjaan_ibu;public $penghasilan_ayah;
 public $penghasilan_ibu;
 //parent education list
 public  static $education = [
     //generate all available education level as key value pair
     '1' => 'Tidak Sekolah',
     '2' => 'SD',
     '3' => 'SMP',
     '4' => 'SMA',
     '5' => 'D1',
     '6' => 'D2',
     '7' => 'D3',
     '8' => 'D4',
     '9' => 'S1',
     '10' => 'S2',
     '11' => 'S3',
 ];
 //parent job list
 public static $job =[
     //generate all available job as key value pair
     '1' => 'Tidak Bekerja',
     '2' => 'Nelayan',
     '3' => 'Petani',
     '4' => 'Peternak',
     '5' => 'PNS/TNI/POLRI',
     '6' => 'Karyawan Swasta',
     '7' => 'Pedagang Kecil',
     '8' => 'Pedagang Besar',
     '9' => 'Wiraswasta',
     '10' => 'Wirausaha',
     '11' => 'Buruh',
     '12' => 'Pensiunan',
     '13' => 'Lainnya',
 ];
 //parent salary list
 public static $salary =[
     //generate all available salary as key value pair
     '1' => 'Kurang dari Rp. 500.000',
     '2' => 'Rp. 500.000 - Rp. 999.999',
     '3' => 'Rp. 1.000.000 - Rp. 1.999.999',
     '4' => 'Rp. 2.000.000 - Rp. 4.999.999',
     '5' => 'Rp. 5.000.000 - Rp. 20.000.000',
     '6' => 'Lebih dari Rp. 20.000.000',
 ];
 //rules to validate the data using the above data members
 public function rules() {
    //rules for all data members, need more improvement
     //more test needed to ensure the data is valid
      return [
           [['nama_ayah_kandung','nama_ibu_kandung','tanggal_lahir_ayah','tanggal_lahir_ibu',
               'pendidikan_ayah_id', 'pendidikan_ibu_id','pekerjaan_ayah','pekerjaan_ibu',
               'penghasilan_ayah','penghasilan_ibu'
               ,'alamat_orang_tua',/*'keluruhan','provinsi','kabupaten','kecamatan,'*/'no_hp_orangtua',], 'required'],

          ['nik_ayah','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],
          ['nik_ibu','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],

          //['tgl_lahir_ayah','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],
          ['tanggal_lahir_ayah', 'date', 'format' => 'php:Y-m-d', 'message' => 'Format tanggal lahir salah'],

          ['tanggal_lahir_ibu','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],

          ['no_hp_orangtua','match','pattern'=>'/^[0-9]*$/','message'=>'No Telepon tidak boleh mengandung huruf'],
          ['no_hp_orangtua','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],

          ['kode_pos_orang_tua','match','pattern'=>'/^[0-9]*$/','message'=>'Kode Pos tidak boleh mengandung huruf'],
          ['kode_pos_orang_tua','string','min'=>5,'max'=>5,'message'=>'Kode Pos harus 5 digit'],

          ['nama_ayah_kandung','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
          ['nama_ibu_kandung','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],

          //rules for salary

      ];
 }
    public function insertDataOTua(){
        if($this->validate())
        {
            //insert data to database table with condition pendafar_id = 1
            $data = [ //possible to change the data members later
                'nama_ayah_kandung' => $this->nama_ayah_kandung,
                'nama_ibu_kandung' => $this->nama_ibu_kandung,
                'nik_ayah' => $this->nik_ayah,
                'nik_ibu' => $this->nik_ibu,

                'tanggal_lahir_ayah' => $this->tanggal_lahir_ayah,
                'tanggal_lahir_ibu' => $this->tanggal_lahir_ibu,
                'pendidikan_ayah_id' => $this->pendidikan_ayah_id,
                'pendidikan_ibu_id' => $this->pendidikan_ibu_id,

                'alamat_orang_tua' => $this->alamat_orang_tua,
                'kode_pos_orang_tua' => $this->kode_pos_orang_tua,
                'pekerjaan_ayah_id' => $this->pekerjaan_ayah,
                'pekerjaan_ibu_id' => $this->pekerjaan_ibu,

                'penghasilan_ayah' => $this->penghasilan_ayah,
                'penghasilan_ibu' => $this->penghasilan_ibu,
                'no_hp_orangtua' => $this->no_hp_orangtua,

                /*'keluruhan' => $this->keluruhan,
                'provinsi' => $this->provinsi,
                'kabupaten' => $this->kabupaten,
                'kecamatan' => $this->kecamatan,*/ //modify later
            ];
            try{ //try to insert data to database, since createCommand() may throw exception
                Yii::$app->db->createCommand()
                    ->update('t_pendaftar', $data, 'pendaftar_id = 13547')
                    ->execute();
                return true; //return true if success
            }
            catch(Exception $e){ //catch exception if any
                echo $e->getMessage();
            }
        }
        return false; //return false if validation failed

    }
}
?>