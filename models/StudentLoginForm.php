<?php
namespace app\models;
use Yii;
use yii\base\Model;
//model for represent the data to handle login form from the student
class StudentLoginForm extends Model {
    public $username; //member variable to store the username
    public $password; //store password
    public bool $rememberMe = true; //store remember me
    private $_user = false; //private property to store the user object
    public function rules(): array //rule for handling given data
    {
        return [
            [['username','password'],'required'],
            ['rememberMe','boolean'],
            ['password','validatePassword'],
        ];
    }
    public static function tableName(): string { //method to return the table name
        return 't_user';
    }
    public function getUser(): string
    { //method to get the user object
        if($this->_user===false){ //if the user object is not set
            $this->_user=Student::findByUsername($this->username);
        }
        return $this->_user; //return the user object
    }
    public function validatePassword($attribute, $params){
        if(!$this->hasErrors()){
            $user = $this->getUser(); //get the user object
            if(!$user || !$user->validatePassword($this->password)){ //validate the password
                //if the password is not valid, add error message
                $this->addError($attribute,'Incorrect username or password.');
            }
        }
    }
}
?>
