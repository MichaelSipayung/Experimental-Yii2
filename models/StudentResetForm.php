<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
class StudentResetForm extends Model {
    public $username; //member variable to store the username
    public function rules() //rule for handling given data
    {
        return [
            [['username'],'required'],
        ];
    }
    //whatsApp api for sending message
    public function sendWhatsApp($phone, $message){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.textmebot.com/send.php?recipient=".$phone."&apikey=dWpS49dVJjZV".
            "&text=".urlencode($message),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
    //method for generate random string
    public function generateRandomString($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters); //get the length of the characters
        $randomString = '';
        for ($i = 0; $i < $length; $i++) { //looping to generate random string
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //reset password using  using whatsApp api and send the new password to the user
    public function resetPassword(): bool
    {
        if($this->validate()){ //if the given data is valid
            $student = Student::find()->where(['username'=>$this->username])->one();
            if ($student) {
                $new_password = $this->generateRandomString(8); //generate random string
                $student->password = $new_password; //set the new password
                if($student->save()){ //if the new password is saved
                    $message = "Password baru anda adalah: ".$new_password;
                    $this->sendWhatsApp($student->phone_number,$message); //send the new password to the user
                    return true;
                }
                else { //if the new password is not saved
                    $this->addError('password','Password gagal direset, silahkan coba lagi');
                }
            }
            else { //if the username is not found
                $this->addError('username','Username tersebut tidak terdaftar');
            }
        } 
        return false;
    }
}
?>