<?php
//this file is intended to be used as a model for personal information
//or (data diri mahasiswa), the data source table is not t_student
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class StudentDataDiriForm extends Model {
    //personal information for student using array, non-static data memeber
    public $nik; public $nisn; public $no_kps;
    public $nama; public $jenis_kelamin;
    public $tanggal_lahir; public $tempat_lahir;
    public $agama_id; public $alamat; public $kelurahan;
    public $provinsi; public $kabupaten; public $alamat_kec;
    public $kode_pos; public $no_telepon_rumah; public $no_telepon_mobile; public $email;
    //additional variable which store the information (key value pair)
    public static array $cities = [
        //city on aceh
        'Banda Aceh'=>'Banda Aceh',
        'Langsa'=>'Langsa',
        'Lhokseumawe'=>'Lhokseumawe',
        'Meulaboh'=>'Meulaboh',
        'Sabang'=>'Sabang',
        'Subulussalam'=>'Subulussalam',
            //city on north sumatera
        'Binjai'=>'Binjai',
        'Gunungsitoli'=>'Gunungsitoli',
        'Medan'=>'Medan',
        'Padangsidempuan'=>'Padangsidempuan',
        'Pematangsiantar'=>'Pematangsiantar',
        'Sibolga'=>'Sibolga',
        'Tanjungbalai'=>'Tanjungbalai',
        'Tebingtinggi'=>'Tebingtinggi',
            //city on riau
        'Dumai'=>'Dumai',
        'Pekanbaru'=>'Pekanbaru',
        'Selatpanjang'=>'Selatpanjang',
        'Tembilahan'=>'Tembilahan',
            //city on kepulauan riau
        'Batam'=>'Batam',
        'Tanjungpinang'=>'Tanjungpinang',
            //city on jambi
        'Jambi'=>'Jambi',
        'Sungai Penuh'=>'Sungai Penuh',
            //city on west sumatera
        'Bukittinggi'=>'Bukittinggi',
        'Padang'=>'Padang',
        'Padangpanjang'=>'Padangpanjang',
        'Pariaman'=>'Pariaman',
        'Payakumbuh'=>'Payakumbuh',
        'Sawahlunto'=>'Sawahlunto',
        'Solok'=>'Solok',
        'Lubuklinggau'=>'Lubuklinggau',
        'Pagaralam'=>'Pagaralam',
        'Palembang'=>'Palembang',
        'Prabumulih'=>'Prabumulih',
            //city on jakarta
        'Jakarta Barat'=>'Jakarta Barat',
        'Jakarta Pusat'=>'Jakarta Pusat',
        'Jakarta Selatan'=>'Jakarta Selatan',
        'Jakarta Timur'=>'Jakarta Timur',
        'Jakarta Utara'=>'Jakarta Utara',
            //city on yogyakarta
        'Bantul'=>'Bantul',
        'Gunungkidul'=>'Gunungkidul',
            //city on papua
        'Jayapura'=>'Jayapura',
        'Merauke'=>'Merauke',
        'Timika'=>'Timika',
            //city on papua barat
        'Sorong'=>'Sorong',
            //city on bali
        'Denpasar'=>'Denpasar',
            //city on nusa tenggara barat
        'Bima'=>'Bima',
        'Mataram'=>'Mataram',
            //city on nusa tenggara timur
        'Kupang'=>'Kupang',
            //city on kalimantan barat
        'Pontianak'=>'Pontianak',
        'Singkawang'=>'Singkawang',
            //city on kalimantan selatan
        'Banjarbaru'=>'Banjarbaru',
        'Banjarmasin'=>'Banjarmasin',
            //city on kalimantan tengah
        'Palangkaraya'=>'Palangkaraya',
            //city on kalimantan timur
        'Balikpapan'=>'Balikpapan',
        'Bontang'=>'Bontang',
        'Samarinda'=>'Samarinda',
            //city on kalimantan utara
        'Tarakan'=>'Tarakan',
            //city on sulawesi barat
        'Mamuju'=>'Mamuju',
            //city on sulawesi selatan
        'Makassar'=>'Makassar',
        'Palopo'=>'Palopo',
        'Parepare'=>'Parepare',
            //city on sulawesi tengah
        'Palu'=>'Palu',
            //city on sulawesi tenggara
        'Bau-Bau'=>'Bau-Bau',
        'Kendari'=>'Kendari',
            //city on sulawesi utara
        'Bitung'=>'Bitung',
        'Kotamobagu'=>'Kotamobagu',
        'Manado'=>'Manado',
        'Tomohon'=>'Tomohon',
            //city on gorontalo
        'Gorontalo'=>'Gorontalo',
        'Majene'=>'Majene',
            //city on maluku
        'Ambon'=>'Ambon',
        'Tual'=>'Tual',
            //city on maluku utara
        'Ternate'=>'Ternate',
        'Tidore Kepulauan'=>'Tidore Kepulauan',
            //city on bengkulu
        'Bengkulu'=>'Bengkulu',
            //city on lampung
        'Bandar Lampung'=>'Bandar Lampung',
        'Metro'=>'Metro',
    ]; //list of cities
    public static array $provinces = [
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
    ]; //list of provinces
    public static array $relegion = [ //list of relegion
        '0' => 'Islam',
        '1' => 'Kristen',
        '2' => 'Katolik',
        '3' => 'Hindu',
        '4' => 'Budha',
        '5' => 'Konghucu',
    ]; //list of relegion
    public static array $gen  = [ '0' => 'Pria', '1' => 'Wanita']; //list of gender
    //rules for handling input data from user
    public function rules()
    {
        //rules for all data member above
        return [
            [['nik','nisn','nama','jenis_kelamin',
                'tanggal_lahir','tempat_lahir',
                'agama_id','alamat','kelurahan','provinsi',
                'kabupaten','alamat_kec','kode_pos'
                ,'no_telepon_mobile','email'],'required'],
            ['email','email'], //email must be valid address
            //nik length minimum is 16 and maximum is 16 and must be integer
            ['nik','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],

            //nisn length minimum is 10 and maximum is 10 and must be integer
            ['nisn','string','min'=>10,'max'=>10,'message'=>'NISN harus 10 digit'],
            //no_kps length minimum is 10 and maximum is 10 and must be integer
            ['no_kps','string','min'=>6,'max'=>6,'message'=>'No KPS harus 6 digit'],
            //rules for kode pos and can't contain character
            ['kode_pos','match','pattern'=>'/^[0-9]*$/','message'=>'Kode Pos tidak boleh mengandung huruf'],
            ['kode_pos','string','min'=>5,'max'=>5,'message'=>'Kode Pos harus 5 digit'],
            //rules for name, minimum length is 3 and maximum length is 50 and can't contain number
            ['nama','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
            //rule for no_telepon_mobile, minimum length is 10 and maximum length is 13 and can't contain character
            ['no_telepon_mobile','match','pattern'=>'/^[0-9]*$/','message'=>'No Telepon tidak boleh mengandung huruf'],
            ['no_telepon_mobile','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],
            //rule for valid email address yahoo, gmail, and hotmail
            ['email','match','pattern'=>'/^[a-zA-Z0-9_.+-]+@(yahoo|gmail|hotmail)+\.(com|co.id)$/','message'=>'Email tidak valid'],
            //rule for tanggal_lahir must be date format and valid date format is yyyy-mm-dd
            ['tanggal_lahir','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],
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
            $data_insert->jenis_kelamin_id = $this->jenis_kelamin;
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
