<?php


class Users {
    public $id;
    public $uname;
    public $pass;
    public $firstname;
    public $lastname;

    // CRUD
    public function create() {        
        global $db;

        $sql = "INSERT INTO users(uname, pwd, firstname, lastname) ";
        $sql .= "values('{$this->uname}',md5('{$this->pass}'),'{$this->firstname}','{$this->lastname}')";

        $result = $db->query($sql);

        if($result) {
            $this->id = $db->get_inserted_id(); // get last ID inserted here
            return true;
        } else{ 
            return false;
        }
    }

    public function delete() {
        global $db;

        $sql = "DELETE FROM users WHERE id={$this->id}";

        $db->query($sql);
    }

    public function update() {
        global $db;

        $sql = "UPDATE users ";
        $sql .= "SET uname='{$this->uname}',pwd=md5('{$this->pass}'),firstname='{$this->firstname}',lastname='{$this->lastname}'";
        $sql .= "WHERE id='{$this->id}'";

        $db->query($sql);

        return $db->get_affected_id() == 1;
    }


    // DB related operations
    public static function find_all() {        
        return self::find_query("SELECT * FROM USERS");
    }

    public static function find_by_id($id) {
        $result = self::find_query("SELECT * FROM USERS");
        return $result[0];    
    }

    public static function find_query($sql) {
        global $db;
        $result_set = $db->query($sql);

        $user_array = array();

        while ($user = $result_set->fetch_assoc()) {
            $user_array[] = self::instantiate($user);     
        }
        return $user_array;
    }

    public static function verify_user($name, $pwd) {
        global $db;

        $sql = "select * from users where uname='{$name}' and pwd=md5('{$pwd}')";
        
        $result = self::find_query($sql);

        return empty($result) ? false : $result[0];


    }

    // Object Creation Method
    public static function instantiate($user) {
        $userObj = new Users();

        $userObj->id        = $user['id'];
        $userObj->uname     = $user['uname'];
        $userObj->pass      = $user['pwd'];
        $userObj->firstname = $user['firstname'];
        $userObj->lastname  = $user['lastname'];

        return $userObj;
    }

}