<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
//model for represent the data to handle login form from the student
class StudentLoginForm extends Model {
    public $username; //member variable to store the username
    public $password; //store password
    //public bool $rememberMe = true; //store remember me
    private $_user = false; //private property to store the user object
    public function rules() //rule for handling given data
    {
        return [
            [['username','password'],'required'],
            //['rememberMe','boolean'],
           // ['password','validatePassword'],
        ];
    }
  /*  public function login(): bool //method to handle login
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(),$this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
    public function getUser(){
        if ($this->_user === false) {
            $this->_user = Student::findByUsername($this->username);
        }
        return $this->_user;
    }*/
}
?>
