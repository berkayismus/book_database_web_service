<?php

class User{
    
    // props
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_status;
    public $user_validate_code;
    public $user_created_date;


    // getter and setters
    function setUserId($user_id){
        $this->user_id = $user_id;
    }
    function getUserId(){
        return $this->user_id;
    }
    //
    function setUserName($user_name){
        $this->user_name = $user_name;
    }

    function getUserName(){
        return $this->user_name;
    }
    //
    function setUserEmail($user_email){
        $this->user_email = $user_email;
    }
    //
    function getUserEmail(){
        return $this->user_email;
    }
    //
    function setUserPassword($user_password){
        $this->user_password = $user_password;
    }

    function getUserPassword(){
        return $this->user_password;
    }
    //
    function setUserStatus($user_status){
        $this->user_status = $user_status;
    }

    function getUserStatus(){
        return $this->user_status;
    }
    //
    function setUserValidateCode($user_validate_code){
        $this->user_validate_code = $user_validate_code;
    }

    function getUserValidateCode(){
        return $this->user_validate_code;
    }
    //
    function setUserCreatedDate($user_created_date){
        $this->user_created_date = $user_created_date;
    }

    function getUserCreatedDate(){
        return $this->user_created_date;
    }
   
} // class sonu

?>

