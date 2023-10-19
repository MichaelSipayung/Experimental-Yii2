<?php
namespace app\controllers; //should be put at the top of the file
use app\models\Country;
use app\models\EntryForm; // EntryForm is a class that represents a form
use app\models\CountryForm;
use app\models\Student;
use app\models\StudentDataDiriForm;
use app\models\StudentDataOForm;
use app\models\StudentDataOrangTuaForm;
use app\models\StudentLoginForm;
use app\models\StudentRegisterForm;
use app\models\StudentResetForm;
use app\models\StudentTokenForm;
use Yii; // Yii is a class that represents the Yii framework
use yii\data\Pagination; // Pagination is a class that represents pagination
use yii\Web\Controller;
class StudentController extends Controller // StudentController extends the Controller class
{
    public function actionIndex(): string { // actionIndex() is the default action in a controller
        return $this->render('index');
    }
    public function actionSay($message = 'Hello'): string { // actionSay() is a custom action in a controller
        return $this->render('say', ['message' => $message]); // render() is  a method of the Controller class
    }
    public function actionEntry(): string // actionEntry() is a custom action in a controller
    {
        $model = new EntryForm(); // create an instance of the EntryForm class
        // load() and validate() are methods of the Model class
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //valid data received in $model
            return $this->render('entry-confirm', ['model' => $model]);
        } else{ //either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }
    public function actionCountry(): string
    {
        $model  = new CountryForm();
        $countries = Country::find()->orderBy('name')->all();
        $country = Country::findOne('US');
        return $this->render('country', ['model' => $model, 'countries' => $countries, 'country' => $country]);
    }
    public function actionShowCountry(): string
    {
        $query = Country::find(); //create active query object
        $pagination  = new Pagination([ // Pagination is a class that represents pagination
            'defaultPageSize' => 5,  //defaultPageSize is a property of the Pagination class
            'totalCount' => $query->count()]); // totalCount is a property of the Pagination class
        $countries  = $query->orderBy('name') //show countries in alphabetical order
            //offset is a property of the Pagination class to indicate the starting row
            ->offset($pagination->offset)
            //limit is a property of the Pagination class to indicate the number of rows
            ->limit($pagination->limit)->all();
        return $this->render('show-country',[
            'countries'=> $countries, // countries is an array of Country objects
            'pagination'=> $pagination // pagination is an object of the Pagination class
        ]);
    }
    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest){ //if the user is not a guest
            return $this->goHome(); //go to the home page
        }
        $model_student  = new StudentLoginForm(); //create an instance of the StudentLoginForm class
        if($model_student->load(Yii::$app->request->post()) && $model_student->login()){
            //if the form is submitted and the login is successful
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        $model_student->password = ''; //clear the password
        return $this->render('login', ['model_student' => $model_student]); //render the login page
    }
    //action for logout
    public function actionLogout()
    {
        Yii::$app->user->logout(); //logout the user
        return $this->goHome(); //go to the previous page, customize this to go to the home page
    }
    //action for reset password
    public function actionResetPassword()
    {
        $model_student_reset  = new StudentResetForm(); //create an instance of the StudentLoginForm class
        if($model_student_reset->load(Yii::$app->request->post()) && 
            $model_student_reset->resetPassword()){
            //if the form is submitted and the password is reset
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        //$model_student_reset->password = ''; //clear the password
        return $this->render('reset-password', ['model_student_reset' => $model_student_reset]); //render the reset password page
    }
    public function actionRegisterStudent(){ //action for handling registration form
        $model_student_register = new StudentRegisterForm(); //create an instance of the StudentRegisterForm class
        if($model_student_register->load(Yii::$app->request->post()) && $model_student_register->registerStudent()){
            //if the form is submitted and the registration is successful
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        return $this->render('register-student',['model_student_register'=>$model_student_register]); //render the registration page

    }
    //action for token student form (for student to input the access token)
    public function actionTokenStudent() {
        $model_student_token = new StudentTokenForm(); //create an instance of the StudentTokenForm class
        //if the form is submitted and the access token is valid
        if($model_student_token->load(Yii::$app->request->post()) && $model_student_token->validateAccessToken()){
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        return $this->render('token-student',['model_student_token'=>$model_student_token]); //render the token student page
    }
    public function actionStudentDataDiri() { //action for personal information form
        //action for personal information form
        $model_student_data_diri = new StudentDataDiriForm(); //create an instance of the StudentDataDiriForm class
        if($model_student_data_diri->load(Yii::$app->request->post())
            && $model_student_data_diri->insertDataDiri()){
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        return $this->render('student-data-diri',
            ['model_student_data_diri'=>$model_student_data_diri]); //render the personal information page(data diri)
    }
    public function actionStudentDataOTua(){
        $model_student_data_o = new StudentDataOForm(); //create an instance of the StudentDataOForm class
        if($model_student_data_o->load(Yii::$app->request->post())
            && $model_student_data_o->insertDataOTua()){
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        return $this->render('student-data-o-tua',
            ['model_student_data_o'=>$model_student_data_o]); //render the parent information page(data orang tua)
    }
    public function actionStudentExtra(){

    }
}
?>