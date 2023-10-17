<?php
//this file is intended to be used as a model for personal information
//or (data diri mahasiswa), the data source table is not t_student
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class StudentDataDiriForm extends Model {
    //personal information for student using array
    public $nik; public $nisn; public $no_kps;
    public $nama; public $jenis_kelamin_id;
    public $tanggal_lahir; public $tempat_lahir;
    public $agama_id; public $alamat; public $kelurahan;
    public $provinsi; public $kabupaten; public $alamat_kec;
    public $kode_pos; public $no_telepon_rumah; public $no_telepon_mobile; public $email;

    //rules for handling input data from user
    public function rules()
    {
        //rules for all data member above
        return [
            [['nik','nisn','no_kps','nama','jenis_kelamin_id',
                'tanggal_lahir','tempat_lahir',
                'agama_id','alamat','kelurahan','provinsi',
                'kabupaten','alamat_kec','kode_pos',
                'no_telepon_rumah','no_telepon_mobile','email'],'required'],
            ['email','email'], //email must be valid address
        ];
    }

    //method for saving data personal information to database
    public function insertDataDiri(){
        if($this->validate())
        {
            $data_insert = new StudentDataDiri();
            //insert all data member above to database using data_insert object
            $data_insert->nik = $this->nik;
            $data_insert->nisn = $this->nisn;
            $data_insert->no_kps = $this->no_kps;
            $data_insert->nama = $this->nama;
            $data_insert->jenis_kelamin_id = $this->jenis_kelamin_id;
            $data_insert->tanggal_lahir = $this->tanggal_lahir;
            $data_insert->tempat_lahir = $this->tempat_lahir;
            $data_insert->agama_id = $this->agama_id;
            $data_insert->alamat = $this->alamat;
            $data_insert->kelurahan = $this->kelurahan;
            $data_insert->provinsi = $this->provinsi;
            $data_insert->kabupaten = $this->kabupaten;
            $data_insert->alamat_kec = $this->alamat_kec;
            $data_insert->kode_pos = $this->kode_pos;
            $data_insert->no_telepon_rumah = $this->no_telepon_rumah;
            $data_insert->no_telepon_mobile = $this->no_telepon_mobile;
            $data_insert->email = $this->email;
            if($data_insert->save()){ //save the data to database
                return true;
            }
            else {
                $this->addError('Gagal menyimpan data, silahkan coba lagi !');
            }
            //insert all data member above to database, an alternative but not recommended
            /*            Yii::$app->db->createCommand()->insert('t_student', [
                'nik' => $this->nik,
                'nisn' => $this->nisn,
                'no_kps' => $this->no_kps,
                'nama' => $this->nama,
                'jenis_kelamin_id' => $this->jenis_kelamin_id,
                'tanggal_lahir' => $this->tanggal_lahir,
                'tempat_lahir' => $this->tempat_lahir,
                'agama_id' => $this->agama_id,
                'alamat' => $this->alamat,
                'kelurahan' => $this->kelurahan,
                'provinsi' => $this->provinsi,
                'kabupaten' => $this->kabupaten,
                'alamat_kec' => $this->alamat_kec,
                'kode_pos' => $this->kode_pos,
                'no_telepon_rumah' => $this->no_telepon_rumah,
                'no_telepon_mobile' => $this->no_telepon_mobile,
                'email' => $this->email,
            ])->execute();*/
        }
        return false;
    }
    //get gender list from database
    public function getGenderList(): array
    {
        $sql = 'SELECT jenis_kelamin FROM t_jenis_kelamin';
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
}
?>
