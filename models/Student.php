<?php
namespace app\models;
use yii\db\ActiveRecord;

class Student extends ActiveRecord {

    public static function tableName(): string { //method to return the table name
        return 't_user';
    }
    public function validateStudent(): bool //find username and password
    {
        if($this->validate()){
            $student = Student::find()->where(['username'=>$this->username])->one();
            if ($student) {
                if ($student->password === $this->password) {
                    return true;
                }
            }
        }
        return false;
    }
}
?>
