<?php
//model for student extra activity form
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentExtraForm extends Model{
    //list of extra activity
    public $kegiatan_1;public $kegiatan_2;public $kegiatan_3;public $kegiatan_4;
    //list of orginization
    public $organisasi_1; public $organisasi_2;public $organisasi_3;public $organisasi_4;
    public function rules(){
        //return
    }
    public function insertStudentExtra(){
        if($this->validate()){
            try{
            }catch(Exception $e){
            }   
        }
    }
}
?>
