<?php 
class Users extends Controller{
    public function __construct(){
        $this ->userModel =$this->model('User');
    }

    public function register(){
        //check for post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //process form
            //sanitize post data
            $_POST =filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //init data
            $data =[
                'UserName' => trim($_POST['UserName']),
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'email' =>trim($_POST['email']),
                'cellNo' =>trim($_POST['cellNo']),
                'password' => trim($_POST['password']),
                'confirm_password' =>trim($_POST['confirm_password']),

                'name_err' => '',
                'cellNo_err' => '',
                'firstName_err' => '',
                'lastName_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            //validate email
            if(empty($data['email'])){ 
                $data ['email_err'] ='please enter email';
            }else {
                //check email exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data ['email_err'] ='email taken';
                }
            }

             //validate Name
             if(empty($data['UserName'])){ 
                $data ['name_err'] ='please enter Name';
            }

             //validate Password
             if(empty($data['password'])){ 
                $data ['password_err'] ='please enter Password';
            }else if(strlen($data['password'])<6){
                $data ['password_err'] ='Paasword must be more than 6 characters';
            }

            //validate confirm password
            if(empty($data['confirm_password'])){ 
                $data ['confirm_password_err'] ='please confirm password';
            }else{
                if($data['confirm_password'] !=$data['password']){
                    $data ['confirm_password_err'] ='Passwords do not match';
                }
            }

            //make sure are empty 
            if (empty($data['email_err']) && 
            empty($data['name_err']) && empty($data['password_err']) &&
             empty($data['confirm_password_err']) ){
                        //validated

                        //hash password
                        $data['password'] =password_hash($data['password']
                        ,PASSWORD_DEFAULT);

                        //Register User
                        if($this->userModel->register($data)){
                        flash('register_success','You are Registered , you can now login');
                          redirect('users/login');
                        }
                        else{
                            die('something went wrong');
                        }
                       
            }else{
                //load view with errors
                $this->view('users/register', $data);
            }


        }
        
        else{
            //load form
            //init data
            $data =[
                'UserName' => '',
                'firstName' => '',
                'lastName' => '',
                'email' =>'',
                'cellNo' =>'',
                'password' => '',
                'confirm_password' =>'',

                'name_err' => '',
                'cellNo_err' => '',
                'firstName_err' => '',
                'lastName_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('users/register', $data);
        }
      }

      public function login(){
        //check for post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //process form
              //sanitize post data
              $_POST =filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              //init data
              $data =[
                  'email' =>trim($_POST['email']),
                  'password' => trim($_POST['password']),                                   
                  'email_err' => '',
                  'password_err' => ''
                  
              ];

              if(empty($data['email'])){ 
                $data ['email_err'] ='please enter email';
            }

            if(empty($data['password'])){ 
                $data ['password_err'] ='please enter Password';
            }

            //make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err']) ){
                //
                die('success');
            }else{
                //load view with errors
                $this->view('users/login', $data);
            }



        }else{
            //load form
            //init data
            $data =[
                'email' =>'',                
                'password' => '',                
                'email_err' => '',
                'password_err' => ''
                
            ];
            $this->view('users/login', $data);
        }
      }
    }