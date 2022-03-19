<?php

class Session {
    public $signed_in;
    public $user_id;
    public $firstname;
    public $lastname;

    function __construct() {
        session_start();   
        $this->check_login();
    }

    public function login($user) {
        if($user) {
            $_SESSION['user_id'] = $user->id;
            $this->user_id =  $user->id;
            $this->firstname =  $user->firstname;
            $this->lastname =  $user->lastname;
            $this->signed_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    public function check_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id =  $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($_SESSION['user_id']);
            $this->signed_in = false;
        }
    }
}

$session = new Session();