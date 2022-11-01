<?php

class RegisterUser {

    private $username;
    private $Raw_Password;
    private $encrypted_password;
    public $error;
    public $success;
    private $storage = "data.json";
    private $stored_users;
    private $new_user;
    
    public function __construct($username , $password){

        $this->Raw_Password=filter_var(trim($password), FILTER_UNSAFE_RAW);
        $this->encrypted_password = password_hash($this->Raw_Password , PASSWORD_DEFAULT);

        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user =[

            "username" => $this->username,

            "password" => $this->encrypted_password,
        ];

        if($this->checkFieldValues()){
            $this->insertUser();
        }
    }

    private function checkFieldValues(){
        if(empty($this->username) || empty($this->Raw_Password)){
            $this->error ="Both fields are required.";
            return false;
        }
    }
    private function usernameExists(){
        foreach($this->stored_users as $user){
            if($this->username == $user['username']){
                $this->error = "Username already taken, please choose a different one";
                return true;
            }
        }
        return false;
    }
    private function insertUser(){
        if($this->usernameExists() == FALSE){
            array_push($this->stored_users, $this->new_user);
            if(file_put_contents($this->storage, json_decode($this->stored_users, JSON_PRETTY_PRINT))){
                return $this->success = "Your registration was successful";
            }
        }
    }

}
?>