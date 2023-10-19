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
    public $nama_ayah_kandung;public $nama_ibu;public $nik_ayah;
    public $nik_ibu;public $tgl_lahir_ayah;public $tgl_lahir_ibu;
    public $pendidikan_ayah;public $pendidikan_ibu;public $alamat_ortu;
    public $keluruhan;public $provinsi;public $kabupaten;
    public $kecamatan;public $kode_pos;public $no_hp_ortu;
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
              [['nama_ayah_kandung','nama_ibu','tgl_lahir_ayah','tgl_lahir_ibu'
                  ,'alamat_ortu','keluruhan','provinsi','kabupaten','kecamatan','no_hp_ortu',], 'required'],

             ['nik_ayah','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],
             ['nik_ibu','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],

             //['tgl_lahir_ayah','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],
             ['tgl_lahir_ayah', 'date', 'format' => 'php:Y-m-d', 'message' => 'Format tanggal lahir salah'],

             ['tgl_lahir_ibu','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],

             ['no_hp_ortu','match','pattern'=>'/^[0-9]*$/','message'=>'No Telepon tidak boleh mengandung huruf'],
             ['no_hp_ortu','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],

             ['kode_pos','match','pattern'=>'/^[0-9]*$/','message'=>'Kode Pos tidak boleh mengandung huruf'],
             ['kode_pos','string','min'=>5,'max'=>5,'message'=>'Kode Pos harus 5 digit'],

             ['nama_ayah_kandung','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
             ['nama_ibu','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],

             //rules for salary

         ];
    }
    //insert all data members into database, consider for more exception handling
    //to ensure the data is inserted successfully
    public function insertDataOrangTua(): bool
    {
        if($this->validate()){
            //$user_id = Yii::$app->user->identity->id;
                //$data_insert_ortu = StudentDataOrangTua::findOne(13547);
                //$data_insert_ortu->nama_re = $this->nama_ayah;

                /*$data_insert_ortu->nama_ibu_kandung = $this->nama_ibu;
                $data_insert_ortu->nik_ayah = $this->nik_ayah;
                $data_insert_ortu->nik_ibu = $this->nik_ibu; */

                /*$data_insert_ortu->tanggal_lahir_ayah = $this->tgl_lahir_ayah;
                $data_insert_ortu->tanggal_lahir_ibu = $this->tgl_lahir_ibu;

                $data_insert_ortu->pendidikan_ayah_id = $this->pendidikan_ayah;
                $data_insert_ortu->pendidikan_ibu_id = $this->pendidikan_ibu;

                $data_insert_ortu->alamat_orang_tua = $this->alamat_ortu;*/

                //to do: add the field to table t_pendaftar
                /*$data_insert->keluruhan = $this->keluruhan;
                $data_insert->provinsi = $this->provinsi;
                $data_insert->kabupaten = $this->kabupaten;
                $data_insert->kecamatan = $this->kecamatan;*/

               /* $data_insert_ortu->kode_pos_orang_tua = $this->kode_pos;
                $data_insert_ortu->no_hp_ortu = $this->no_hp_ortu;

                $data_insert_ortu->pekerjaan_ayah_id = $this->pekerjaan_ayah;
                $data_insert_ortu->pekerjaan_ibu_id = $this->pekerjaan_ibu;

                $data_insert_ortu->penghasilan_ayah = $this->penghasilan_ayah;
                $data_insert_ortu->penghasilan_ibu = $this->penghasilan_ibu; */
                /*if($data_insert_ortu->save()) {
                    return true;
                }
                else{
                    $this->addError("Error", "Data Orang Tua Gagal Disimpan");
                }*/
                $command  = Yii::$app->db->createCommand();
                //set the table name and insert data to specific pendaftar_id
                //$command->sql('INSERT INTO t_pendaftar (nama_ayah_kandung) VALUES (:nama_ayah) WHERE pendaftar_id = 13557');
                $command->setSql( "UPDATE t_pendaftar SET nama_ayah_kandung=\"arnold\" where  pendaftar_id = 13557");
                //$command->bindValues(['nama_ayah' => $this->nama_ayah]);
                //execute the query
                $command->execute();
                return true;
            }
        return false;
    }
}
?>
