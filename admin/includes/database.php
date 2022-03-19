<?php
require_once "config.php";

class Database {
    private $conn;

    public function open_db_connection() {
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        if($this->conn->connect_errno) {
            die("Failed to Connect with error: " . $this->conn->connect_error);
        } 
    }

    public function query($sql) {
        $result = $this->conn->query($sql);

        if (!$result) {
            die('query failed');
        }

        return $result;        
    }

    public function get_inserted_id() {
        return $this->conn->insert_id;
    }

    public function get_affected_id() {
        return $this->conn->affected_rows;
    }

    public function get_db() {
        return $this->conn;
    }
}

$db = new Database();
$db->open_db_connection();

