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
    public static array $cities = array(
        "Aceh" => array("Banda Aceh", "Langsa", "Lhokseumawe", "Sabang", "Subulussalam", "Bireuen"),
        "Sumatera Utara" => array("Binjai", "Medan", "Sibolga", "Tanjung Balai", "Tebing Tinggi", "Gunungsitoli",
            "Padang Sidempuan", "Tanjungbalai Asahan", "Pematang Siantar",'Kisaran','Rantau Prapat'),
        "Riau" => array("Dumai", "Pekanbaru", "Tembilahan", "Bangkinang", "Bengkalis", "Selat Panjang", "Siak Sri Indrapura",
            "Teluk Kuantan",'Bagansiapiapi','Rengat','Tanjung Pinang','Tanjung Balai Karimun','Tanjung Batu','Tanjung Pinang',),
        "Sumatera Barat" => array("Bukittinggi", "Padang", "Padang Panjang", "Pariaman", "Payakumbuh", "Sawahlunto", "Solok"),
        "Sumatera Selatan" => array("Lahat", "Palembang", "Prabumulih", "Baturaja", "Lubuklinggau", "Pagar Alam", "Pangkalan Balai", 'Indralaya','Kayu Agung','Lubuklinggau','Martapura','Muara Beliti Baru','Muara Enim','Muara Beliti',
            'Muara Enim','Muara Belit'),
        "Kepulauan Riau" => array("Batam", "Tanjung Balai Karimun", "Tanjung Pinang", "Tarempa", "Teluk Kuantan", "Dabo Singkep"),
        "Bali" => array("Denpasar", "Singaraja", "Tabanan"),
        "Banten" => array("Cilegon", "Serang", "Tangerang"),
        "Bengkulu" => array("Bengkulu", "Curup", "Manna"),
        "DI Yogyakarta" => array("Bantul", "Sleman", "Yogyakarta"),
        "DKI Jakarta" => array("Jakarta Barat", "Jakarta Pusat", "Jakarta Selatan"),
        "Gorontalo" => array("Gorontalo", "Limboto", "Tilamuta"),
        "Jambi" => array("Jambi", "Kuala Tungkal", "Sarolangun"),
        "Jawa Barat" => array("Bandung", "Bekasi", "Cimahi"),
        "Jawa Tengah" => array("Magelang", "Pekalongan", "Surakarta"),
        "Jawa Timur" => array("Malang", "Surabaya", "Tuban"),
        "Kalimantan Barat" => array("Ketapang", "Pontianak", "Singkawang"),
        "Kalimantan Selatan" => array("Banjarbaru", "Banjarmasin", "Martapura"),
        "Kalimantan Tengah" => array("Kasongan", "Palangka Raya", "Sampit"),
        "Kalimantan Timur" => array("Balikpapan", "Bontang", "Samarinda"),
        "Kalimantan Utara" => array("Bulungan", "Malinau", "Tarakan"),
        "Kepulauan Bangka Belitung" => array("Pangkal Pinang", "Tanjung Pandan", "Toboali"),
        "Lampung" => array("Bandar Lampung", "Kotabumi", "Metro"),
        "Maluku" => array("Ambon", "Tual", "Weda"),
        "Maluku Utara" => array("Jailolo", "Ternate", "Tobelo"),
        "Nusa Tenggara Barat" => array("Bima", "Mataram", "Sumbawa Besar"),
        "Nusa Tenggara Timur" => array("Ende", "Kupang", "Maumere"),
        "Papua" => array("Jayapura", "Merauke", "Timika"),
        "Papua Barat" => array("Fakfak", "Manokwari", "Sorong"),
        "Sulawesi Barat" => array("Majene", "Mamuju", "Polewali Mandar"),
        "Sulawesi Selatan" => array("Makassar", "Palopo", "Parepare"),
        "Sulawesi Tengah" => array("Donggala", "Palu", "Poso"),
        "Sulawesi Tenggara" => array("Bau-Bau", "Kendari", "Raha"),
        "Sulawesi Utara" => array("Bitung", "Manado", "Tomohon"));
    //list of indonesian provinces
    public static $provinces=[
        '1'=>'Aceh',
        '2'=>'Sumatera Utara',
        '3'=>'Sumatera Barat',
        '4'=>'Riau',
        '5'=>'Jambi',
        '6'=>'Sumatera Selatan',
        '7'=>'Bengkulu',
        '8'=>'Lampung',
        '9'=>'Kepulauan Bangka Belitung',
        '10'=>'Kepulauan Riau',
        '11'=>'DKI Jakarta',
        '12'=>'Jawa Barat',
        '13'=>'Jawa Tengah',
        '14'=>'DI Yogyakarta',
        '15'=>'Jawa Timur',
        '16'=>'Banten',
        '17'=>'Bali',
        '18'=>'Nusa Tenggara Barat',
        '19'=>'Nusa Tenggara Timur',
        '20'=>'Kalimantan Barat',
        '21'=>'Kalimantan Tengah',
        '22'=>'Kalimantan Selatan',
        '23'=>'Kalimantan Timur',
        '24'=>'Kalimantan Utara',
        '25'=>'Sulawesi Utara',
        '26'=>'Sulawesi Tengah',
        '27'=>'Sulawesi Selatan',
        '28'=>'Sulawesi Tenggara',
        '29'=>'Gorontalo',
        '30'=>'Sulawesi Barat',
        '31'=>'Maluku',
        '32'=>'Maluku Utara',
        '33'=>'Papua',
        '34'=>'Papua Barat',
    ];

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
