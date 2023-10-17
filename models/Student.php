<?php
namespace app\models;
use yii\db\ActiveRecord;

class Student extends ActiveRecord {

    public static function tableName(): string { //method to return the table name
        return 't_user';
    }
}
?>
