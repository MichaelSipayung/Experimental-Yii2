<?php
//model for student extra activity form, an idea is merge all form into one model
//since this is very short, we can put it in one file, for example : Student
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentExtraForm extends Model {
    //public public data member, possibly adding latter
    //member for organization
    public $nama_organisasi_1; 
    public $nama_organisasi_2;
    public $nama_organisasi_3;
    public $nama_organisasi_4;

    public $jabatan_organisasi_1;
    public $jabatan_organisasi_2;
    public $jabatan_organisasi_3;
    public $jabatan_organisasi_4;

    public $tanggal_organisasi_1;
    public $tanggal_organisasi_2;
    public $tanggal_organisasi_3;
    public $tanggal_organisasi_4;

    public $tanggal_organisasi_1_end;
    public $tanggal_organisasi_2_end;
    public $tanggal_organisasi_3_end;
    public $tanggal_organisasi_4_end;
    //member for activity, without end mean the start of the activity
    public $nama_kegiatan_1; 
    public $nama_kegiatan_2;
    public $nama_kegiatan_3; 
    public $nama_kegiatan_4; 

    public $predikat_kegiatan_1;
    public $predikat_kegiatan_2;
    public $predikat_kegiatan_3;
    public $predikat_kegiatan_4;

    public $tanggal_kegiatan_1;
    public $tanggal_kegiatan_2;
    public $tanggal_kegiatan_3;
    public $tanggal_kegiatan_4;

    public $tanggal_kegiatan_1_end;
    public $tanggal_kegiatan_2_end;
    public $tanggal_kegiatan_3_end;
    public $tanggal_kegiatan_4_end;

    //array for store jabaatan values
    public static $jabatan = [
        '1'=>'Ketua',
        '2'=>'Wakil Ketua',
        '3'=>'Sekretaris',
        '4'=>'Bendahara',
        '5'=>'Anggota'
    ];
    //array for store the predikat values
    public static $predikat = [
        '1'=>'Juara 1',
        '2'=>'Juara 2',
        '3'=>'Juara 3',
        '4'=>'Juara Harapan 1',
        '5'=>'Juara Harapan 2',
        '6'=>'Juara Harapan 3',
        '7'=>'Peserta'
    ];

    public function rules(): array
    {
        //return rules for validation
        return [
            [['tanggal_organisasi_1','tanggal_organisasi_2','tanggal_organisasi_3','tanggal_organisasi_4',
            'tanggal_organisasi_1_end','tanggal_organisasi_2_end','tanggal_organisasi_3_end','tanggal_organisasi_4_end',
            'tanggal_kegiatan_1','tanggal_kegiatan_2','tanggal_kegiatan_3','tanggal_kegiatan_4',
            'tanggal_kegiatan_1_end','tanggal_kegiatan_2_end','tanggal_kegiatan_3_end','tanggal_kegiatan_4_end'] ,
            'date', 'format' => 'php:Y-m-d'],
            //rule for nama_organisasi, we need to make sure the value is no more than 25 character
            [['nama_organisasi_1','nama_organisasi_2','nama_organisasi_3','nama_organisasi_4',
            'nama_kegiatan_1','nama_kegiatan_2','nama_kegiatan_3','nama_kegiatan_4'], 'string', 'max' => 25],
        ];
    }
    //validate data, this is experimental version, since there are some question about the structure of the table
    //but this mechanism is possible to be used, and the table structure can be changed later
    public function insertStudentExtra(): bool
    {
        if($this->validate()){
            //before doing insertion or update, we need an exception handling
            try{ //make sure exception is catched
                $data_kegiatan = [
                    'nama_kegiatan_1' => $this->nama_kegiatan_1,
                    'nama_kegiatan_2' => $this->nama_kegiatan_2,
                    'nama_kegiatan_3' => $this->nama_kegiatan_3,
                    'nama_kegiatan_4' => $this->nama_kegiatan_4,

                    'predikat_kegiatan_1' => $this->predikat_kegiatan_1,
                    'predikat_kegiatan_2' => $this->predikat_kegiatan_2,
                    'predikat_kegiatan_3' => $this->predikat_kegiatan_3,
                    'predikat_kegiatan_4' => $this->predikat_kegiatan_4,

                    'tanggal_kegiatan_1' => $this->tanggal_organisasi_1,
                    'tanggal_kegiatan_2' => $this->tanggal_organisasi_2,
                    'tanggal_kegiatan_3' => $this->tanggal_organisasi_3,
                    'tanggal_kegiatan_4' => $this->tanggal_organisasi_4,

                    'tanggal_kegiatan_1_end' => $this->tanggal_organisasi_1_end,
                    'tanggal_kegiatan_2_end' => $this->tanggal_organisasi_2_end,
                    'tanggal_kegiatan_3_end' => $this->tanggal_organisasi_3_end,
                    'tanggal_kegiatan_4_end' => $this->tanggal_organisasi_4_end,
                ];

                $data_organisasi=[
                    'nama_organisasi_1' => $this->nama_organisasi_1,
                    'nama_organisasi_2' => $this->nama_organisasi_2,
                    'nama_organisasi_3' => $this->nama_organisasi_3,
                    'nama_organisasi_4' => $this->nama_organisasi_4,

                    'jabatan_organisasi_1' => $this->jabatan_organisasi_1,
                    'jabatan_organisasi_2' => $this->jabatan_organisasi_2,
                    'jabatan_organisasi_3' => $this->jabatan_organisasi_3,
                    'jabatan_organisasi_4' => $this->jabatan_organisasi_4,

                    'tanggal_organisasi_1' => $this->tanggal_organisasi_1,
                    'tanggal_organisasi_2' => $this->tanggal_organisasi_2,
                    'tanggal_organisasi_3' => $this->tanggal_organisasi_3,
                    'tanggal_organisasi_4' => $this->tanggal_organisasi_4,

                    'tanggal_organisasi_1_end' => $this->tanggal_organisasi_1_end,
                    'tanggal_organisasi_2_end' => $this->tanggal_organisasi_2_end,
                    'tanggal_organisasi_3_end' => $this->tanggal_organisasi_3_end,
                    'tanggal_organisasi_4_end' => $this->tanggal_organisasi_4_end,
                ];
                //due to the structure of the table, we need to use update instead of insert
                //and we need to use static value for pendaftar_id (experimental version)
                //thi is will not implemented in the final version, we need more improve in the design of the database
                Yii::$app->db->createCommand()
                    ->update('t_extrakurikuler', $data_kegiatan, 'pendaftar_id = 13547')
                    ->execute();
                //same as above but for organisasi
                Yii::$app->db->createCommand()
                    ->update('t_organisasi', $data_organisasi, 'pendaftar_id = 13547')
                    ->execute();

                return true;
            }catch(Exception $e){
                //throw execption if failed
                echo $e->getMessage();
            }   
        }
        return false;
    }
}
?>
