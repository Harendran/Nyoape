<?php
    class User{
        private $db;

        public function __construct(){
            $this ->db =new Database;
        }
        //register function

        public function register($data){
            $this->db->query('INSERT INTO users
            (UserName, firstName,lastName,
            password,email,cellNo,dateRegistered)
             VALUES (:UserName,:firstName,:lastName,
             :password,:email,:cellNo,NOW())');
             //bind values
              $this->db->bind(':UserName' ,$data['UserName']);
              $this->db->bind(':firstName' ,$data['firstName']);
              $this->db->bind(':lastName' ,$data['lastName']);
              $this->db->bind(':password' ,$data['password']);
              $this->db->bind(':email' ,$data['email']);
              $this->db->bind(':cellNo' ,$data['cellNo']);

             if($this->db->execute()){
                 return true;
             }
             else{
                 return false;
             }
        }

        //Find User by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users where email= :email');
            $this->db->bind(':email' ,$email);

            $row = $this ->db->single();

            //check row
            if($this->db->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }