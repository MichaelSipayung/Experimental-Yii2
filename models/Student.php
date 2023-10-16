<?php
namespace app\models;
class Student extends \yii\base\BaseObject implements \yii\web\IdentityInterface {

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    private static function findOne(array $array)
    {
        $username = $array['username'];
        $password = $array['password'];
        $sql = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
        return $sql;
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public function findByUsername($username) { //find username
        return static::findOne(['username'=>$username]); //find username in the database
    }
    public function validatePassword($password): bool{ //validate password
        return $this->password === $password; //compare the password
    }
}
?>
