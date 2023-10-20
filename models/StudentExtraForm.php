<?php
//model for student extra activity form, an idea is merge all form into one model
//since this is very short, we can put it in one file, for example : Student
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentExtraForm extends Model {
    //list of extra activity
    //list of orginization
    public $nama_organisasi_1; public $nama_organisasi_2;public $nama_organisasi_3;public $nama_organisasi_4;
    public $tanggal_organisasi_1;public $tanggal_organisasi_2;public $tanggal_organisasi_3;public $tanggal_organisasi_4;

    public function rules(): array
    {
        //return rules for validation
        return [
            /*[['date_keg_1','date_keg_2','date_keg_3','date_keg_4'],'date','format'=>'yyyy-mm-dd','message'=>'Format tanggal kegiatan salah'],
            [['kegiatan_1','kegiatan_2','kegiatan_3','kegiatan_4'],'string','max'=>30,'message'=>'Nama kegiatan terlalu panjang'] */
            [['tanggal_organisasi_1','tanggal_organisasi_2','tanggal_organisasi_3','tanggal_organisasi_4'],'date',
                'format'=>'yyyy-mm-dd','message'=>'Format tanggal organisasi salah'],
            [['nama_organisasi_1','nama_organisasi_2','nama_organisasi_3','nama_organisasi_4'],
                'string','max'=>30,'message'=>'Nama organisasi terlalu panjang'],
        ];
    }
    //validate data, this is experimental version, since there are some question about the structure of the table
    //but this mechanism is possible to be used, and the table structure can be changed later
    public function insertStudentExtra(): bool
    {
        if($this->validate()){
            //before doing insertion or update, we need an exception handling
            try{ //make sure exception is catched
                $data = [
                    /*'kegiatan_1' => $this->kegiatan_1,
                    'kegiatan_2' => $this->kegiatan_2,
                    'kegiatan_3' => $this->kegiatan_3,
                    'kegiatan_4' => $this->kegiatan_4,
                    'date_keg_1' => $this->date_keg_1,
                    'date_keg_2' => $this->date_keg_2,
                    'date_keg_3' => $this->date_keg_3,
                    'date_keg_4' => $this->date_keg_4,*/
                    'nama_organisasi_1' => $this->nama_organisasi_1,
                    'nama_organisasi_2' => $this->nama_organisasi_2,
                    'nama_organisasi_3' => $this->nama_organisasi_3,
                    'nama_organisasi_4' => $this->nama_organisasi_4,

                    'tanggal_organisasi_1' => $this->tanggal_organisasi_1,
                    'tanggal_organisasi_2' => $this->tanggal_organisasi_2,
                    'tanggal_organisasi_3' => $this->tanggal_organisasi_3,
                    'tanggal_organisasi_4' => $this->tanggal_organisasi_4,
                    //Todo : add more data members here
                ];
                Yii::$app->db->createCommand()
                    ->update('t_organisasi', $data, 'pendaftar_id = 13547')
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
