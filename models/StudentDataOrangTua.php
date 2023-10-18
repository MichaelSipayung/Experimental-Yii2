<?php
//model to store parent data (orant tua), the  current source is getting from the student data diri
//model, may be changed later if needed, the controller is StudentController.php and the view is
//student-data-orang-tua.php, action is student-data-orang-tua, it's also possible to change later
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentDataOrangTua extends ActiveRecord{
    //table name
    public static function tableName(){
        return 't_pendaftar';
    }
}
?>
